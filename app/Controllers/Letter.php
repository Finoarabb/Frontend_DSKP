<?php

namespace App\Controllers;

use App\Models\Disposisi;
use App\Models\Letter as ModelsLetter;
use CodeIgniter\HTTP\Response;
use CodeIgniter\HTTP\ResponseTrait;
use Config\Services;

class Letter extends BaseController
{
    protected $letter_model;
    protected $disp_model;
    use ResponseTrait;
    public function __construct()
    {
        $this->letter_model = new ModelsLetter();
        $this->disp_model = new Disposisi();
    }
    public function viewPdf($id = null)
    {
        $surat = $this->letter_model->find($id);
        $tipe = empty($surat['asal']) ? 'keluar/' : 'masuk/';
        $pdfPath = WRITEPATH . 'uploads/' . $tipe . (string)$surat['file'];
        if (file_exists($pdfPath) && is_readable($pdfPath)) {
            $type = mime_content_type($pdfPath);

            $response = $this->response;
            $response->setHeader('Content-Type', $type);
            $response->setBody(file_get_contents($pdfPath));
            return $response;
        } else {
            return $this->response->setStatusCode(404, 'File not found');
        }
    }

    public function surat($tipe = null)
    {
        $me = session()->getFlashdata('me');
        $token = $this->request->getCookie('token');
        $data = [
            'me' => $me,
            'title' => 'Surat ' . $tipe,
            'currentURI' => 'srt' . $tipe,
            'tipe' => $tipe,
            'token' => $token
        ];
        switch ($me['role']) {
            case 'staff':
                $surat = $this->disp_model
                    ->join('letters', 'disposisi.sid=letters.id', 'right')
                    ->where('uid', $me['uid'])
                    ->where($tipe !== 'masuk' ? 'asal' : 'tujuan', '')
                    ->findAll();
                break; // Added 'break' statement

            case 'kepala':
                if ($tipe === 'masuk')
                    $surat = $this->letter_model
                        ->where('status >=', 2)
                        ->where('tujuan', '')
                        ->findAll();
                else $surat = $this->letter_model
                    ->where($tipe !== 'masuk' ? 'asal' : 'tujuan', '')
                    ->findAll();
                break; // Added 'break' statement

            default:
                $surat = $this->letter_model
                    ->where($tipe !== 'masuk' ? 'asal' : 'tujuan', '')
                    ->findAll();
                break; // Added 'break' statement
        }
        setlocale(LC_TIME, 'IND');
        $englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $indonesianMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'];


        $data['surat'] = $surat;
        $data['msg'] = session()->getFlashdata('msg');
        $data['disposed'] = (session()->getFlashdata('disposed'));
        return view('pages/surat', $data);
    }

    public function newSurat(string $tipe = null)
    {
        $jenis = $tipe === 'masuk' ? 'asal' : 'tujuan';
        $rules = [
            'file' => 'uploaded[file]|mime_in[file,image/jpg,image/jpeg,image/png,application/pdf]',
            'no_surat' => 'required|is_unique[letters.no_surat]',
            'tanggal' => 'required',
            'perihal' => 'required',
            $jenis => 'required'
        ];
        $errors = [
            'file' => [
                'uploaded' => 'Silahkan sertakan file terkait',
                'mime_in' => 'Sertakan dalam format pdf atau Gambar'
            ],
            'no_surat' => ['required' => 'Silahkan sertakan nomor surat', 'is_unique' => 'Nomor Surat sudah digunakan'],
            'tanggal' => ['required' => 'Silahkan sertakan tanggal surat'],
            'perihal' => ['required' => 'Masukkan Perihal Surat'],
            $jenis => ['required' => 'Silahkan sertakan ' . $tipe . ' surat']

        ];
        if (!$this->validate($rules, $errors)) {
            session()->setFlashdata('msg', $this->validator->getErrors());
            return $this->response->redirect('srt' . $tipe);
        }
        $file = $this->request->getFile('file');
        $filename = $file->getRandomName();
        $tanggal = str_replace('/', '-', $this->request->getPost('tanggal'));
        $data = [
            'no_surat' => $this->request->getPost('no_surat'),
            'tanggal' => date('Y-m-d', strtotime((string)$tanggal)),
            $jenis => $this->request->getPost($jenis),
            'perihal' => $this->request->getPost('perihal'),
        ];
        if (!empty($this->request->getPost('lamlran')))
            $data['lampiran'] = $this->request->getPost('lampiran');
        if (!empty($file->getTempName()))
            $data['file'] = $filename;
        $letter = $this->letter_model->insert($data, false);
        if (!$file->hasMoved()) $file->move(WRITEPATH . '/uploads/' . $tipe, $filename);
        if (!$letter) session()->setFlashdata('msg', ['Menambahkan Ke Database Error' => 'Gagal Menambahkan Surat']);
        else session()->setFlashdata('msg', true);
        return $this->response->redirect('srt' . $tipe);
    }


    public function editLetter($id = null)
    {
        $surat = $this->letter_model->find($id);
        $data = [];
        if (!empty($this->request->getPost('no_surat')))
            $data['no_surat'] = $this->request->getPost('no_surat');
        $jenis = empty($surat['tujuan']) ? 'asal' : 'tujuan';
        if (!empty($this->request->getPost($jenis)))
            $data[$jenis] = $this->request->getPost($jenis);
        if (!empty($this->request->getPost('tanggal')))
            $tanggal = str_replace('/', '-', $this->request->getPost('tanggal'));
        $data['tanggal'] = date('Y-m-d', strtotime((string)$tanggal));
        if (!empty($this->request->getPost('perihal')))
            $data['perihal'] = $this->request->getPost('perihal');
        if (!empty($this->request->getPost('lampiran')))
            $data['lampiran'] = $this->request->getPost('lampiran');

        $file = $this->request->getFile('file');
        if (!empty($file->getName())) {
            $extension = $file->getClientExtension();
            $filename = $this->request->getVar('no_surat') . '.' . $extension;
            $data['file'] = $filename;
            $pdfPath = WRITEPATH . 'uploads/' . $jenis === 'asal' ? 'masuk/' : 'keluar/' . $surat['file'];
            unlink($pdfPath);
            if (!$file->hasMoved()) $file->move(WRITEPATH . '/uploads/' . $jenis === 'asal' ? 'masuk' : 'tujuan', $filename);
        }
        $letter = $this->letter_model->update($id, $data);
        return $this->response->redirect('/srt' . ($jenis === 'asal' ? 'masuk' : 'keluar'));
    }
    public function approveLetter()
    {
        $sid = $this->request->getPost('sid');
        $status = $this->request->getPost('status');
        $letter = $this->letter_model->update($sid, ['status' => $status]);
        return $this->response->redirect('srtmasuk');
    }

    public function deleteLetter($id = null)
    {

        $tipe = $this->request->getPost('tipe');
        $surat = $this->letter_model->find($id);
        $filename = $surat['file'];
        unlink(WRITEPATH . '/uploads/' . $tipe, $filename);
        $letter = $this->letter_model->delete($id);
        return $this->response->redirect('/srt' . $tipe);
    }

    public function disposeLetter()
    {

        $data = $this->request->getRawInput();

        $temp = $this->disp_model->whereIn('uid', $data['disposalTarget'])->where('sid', $data['sid'])->findAll();
        if (!empty($temp)) session()->setFlashdata('disposed', 'Disposisi Sudah dilakukan');
        // var_dump($body);exit;
        else {
            $this->letter_model->update($data['sid'], ['status' => 5]);
            $tujuan = [];
            foreach ($data['disposalTarget'] as $item)
                $tujuan[] = ['uid' => $item, 'sid' => $data['sid'], 'pesan' => $data['pesan']];
            $result = $this->disp_model->insertBatch($data);
            $this->disp_model->insertBatch();
            session()->setFlashdata('disposed', '');
        }
        return $this->response->redirect('srtmasuk');
    }

    public function monthlyLetter()
    {
        $tipe = $this->request->getPost('tipe');
        $bulan = $this->request->getPost('bulan');
        if (empty($bulan)) {
            $data = $this->letter_model->where($tipe === 'masuk' ? 'tujuan' : 'asal', '')->findAll();
        } else {
            $data = $this->letter_model
                ->where($tipe === 'masuk' ? 'tujuan' : 'asal', '')
                ->where('DATE_FORMAT(' . ($tipe === "masuk" ? "created_at" : "tanggal") . ',"%c/%Y")', $bulan)
                ->findAll();
        }
        $englishMonths = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
        $indonesianMonths = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Agt', 'Sep', 'Okt', 'Nov', 'Des'];


        // $data = array_map(function ($item) use ($englishMonths, $indonesianMonths) {
        //     $item['tanggal'] = str_replace($englishMonths, $indonesianMonths, date('d F Y', strtotime($item['tanggal'])));
        //     $item['created_at'] = str_replace($englishMonths, $indonesianMonths, date('d F Y', strtotime($item['created_at'])));
        //     return $item;
        // }, $data);
        return json_encode($data);
    }

    public function disposedLetter($id = null)
    {
        $data = $this->disp_model
            ->join('letters', 'disposisi.sid=letters.id', 'right')
            ->where('sid', $id)
            ->join('users', 'disposisi.uid=users.id')
            ->findAll();
        return json_encode($data);
    }
    public function dispLetter()
    {
        $me = session()->getFlashdata('me');
        $data = [
            'me' => $me,
            'title' => 'Disposisi Masuk',
            'currentURI' => 'dispLetter',
        ];
        $response = $this->disp_model
            ->join('letters', 'disposisi.sid=letters.id')
            ->where('uid', $me['uid'])
            ->findAll(); 
            $data['surat']=$response;  
        return view('pages/disposedSurat',$data);
    }
}
