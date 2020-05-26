<?php

class c_cron extends CI_Controller
{
    public function runTawaran()
    {
        $this->load->model('m_tawaranPekerjaan');
        $tanggalSekarang = mdate("%Y-%m-%d %H:%i");
        $tawaran = $this->m_tawaranPekerjaan->getDay($tanggalSekarang);
        if (!empty($tawaran)) {
            foreach ($tawaran as $twr) {
                $this->m_tawaranPekerjaan->autoTolakTawaran($twr['idTawaran']);
                $subject = 'Tawaran Pekerjaan-Mu ditolak!';
                $message = 'Hai ' . $twr['namaPK'] . ', Pekerja Lepas ' . $twr['namaPL'] . ' menolak pekerjaan yang kamu tawarkan:(. Yuk cari lagi Pekerja Lepas yang lain.';
                $this->sendEmail($twr['emailPK'], $subject, $message);
            }
        }
    }

    public function runKontrak()
    {
        $this->load->model('m_kontrak');
        $tanggalSekarang = mdate("%Y-%m-%d %H:%i");
        $kontrak = $this->m_kontrak->getDay($tanggalSekarang);
        if (!empty($kontrak)) {
            foreach ($kontrak as $ktk) {
                $this->m_kontrak->autoKonfirmasiKontrak($ktk['idKontrak']);
                $subject = 'Kontrak-Mu Sudah Selesai!';
                $message = 'Hai ' . $ktk['emailPK'] . ', Pekerja Lepas ' . $ktk['namaPL'] . ' sudah melakukan konfirmasi kontrak. Silahkan cek web Yugawe untuk mendownload kontrak.';
                $this->sendEmail($ktk['emailPK'], $subject, $message);
            }
        }
    }

    public function sendEmail($emailTo, $subject, $message)
    {
        $config = array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.googlemail.com',
            'smtp_port' => 465,
            'smtp_user' => 'yugawe@gmail.com',
            'smtp_pass' => 'yugawe123',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1'
        );
        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('yugawe@gmail.com', 'PT. Yugawe');
        $this->email->to($emailTo);
        $this->email->subject($subject);
        $this->email->message($message);
        return $this->email->send();
    }
}
