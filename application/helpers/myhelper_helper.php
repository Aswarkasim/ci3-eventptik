
<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('nominal')) {
    function nominal($angka)
    {
        $jd = number_format($angka, 0, ',', '.');
        return $jd;
    }
}

function is_logged_in_user()
{
    $ci = get_instance();
    if ($ci->session->userdata('id_user') == '') {
        redirect('home/auth');
    }
}
function is_logged_in_admin()
{
    $ci = get_instance();
    if ($ci->session->userdata('id_admin') == '') {
        redirect('admin/auth');
    }
}


function is_logged_in_panitia()
{
    $ci = get_instance();
    if ($ci->session->userdata('id_panitia') == '') {

        redirect('home', 'refresh');
    }
}

function post($name)
{
    $ci = get_instance();
    $ci->input->post($name);
}

if (!function_exists('convert_number')) {
    function convert_number($no)
    {
        if (!preg_match('/[+0-9]/', trim($no))) {
            //cek apakah no hp karakter 1-3 ada +62
            if (substr(trim($no), 0, 3) == '+62') {
                $hp = trim($no);
            }
            //cek appakah no hp karakter 1 adlah 0
            elseif (substr(trim($no), 0, 1) == '0') {
                $hp = '+62' . substr(trim($no), 1);
            } else {
                $hp = '00000';
            }
            return $hp;
        }
    }

    if (!function_exists('tgl_indo')) {
        function date_indo($tgl)
        {
            $ubah = gmdate($tgl, time() + 60 * 60 * 8);
            $pecah = explode("-", $ubah);
            $tanggal = $pecah[2];
            $bulan = bulan($pecah[1]);
            $tahun = $pecah[0];
            return $tanggal . ' ' . $bulan . ' ' . $tahun;
        }
    }

    if (!function_exists('bulan')) {
        function bulan($bln)
        {
            switch ($bln) {
                case 1:
                    return "Januari";
                    break;
                case 2:
                    return "Februari";
                    break;
                case 3:
                    return "Maret";
                    break;
                case 4:
                    return "April";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Juni";
                    break;
                case 7:
                    return "Juli";
                    break;
                case 8:
                    return "Agustus";
                    break;
                case 9:
                    return "September";
                    break;
                case 10:
                    return "Oktober";
                    break;
                case 11:
                    return "November";
                    break;
                case 12:
                    return "Desember";
                    break;
            }
        }
    }

    //Format Shortdate
    if (!function_exists('shortdate_indo')) {
        function shortdate_indo($tgl)
        {
            $ubah = gmdate($tgl, time() + 60 * 60 * 8);
            $pecah = explode("-", $ubah);
            $tanggal = $pecah[2];
            $bulan = short_bulan($pecah[1]);
            $tahun = $pecah[0];
            return $tanggal . '/' . $bulan . '/' . $tahun;
        }
    }

    if (!function_exists('short_bulan')) {
        function short_bulan($bln)
        {
            switch ($bln) {
                case 1:
                    return "01";
                    break;
                case 2:
                    return "02";
                    break;
                case 3:
                    return "03";
                    break;
                case 4:
                    return "04";
                    break;
                case 5:
                    return "05";
                    break;
                case 6:
                    return "06";
                    break;
                case 7:
                    return "07";
                    break;
                case 8:
                    return "08";
                    break;
                case 9:
                    return "09";
                    break;
                case 10:
                    return "10";
                    break;
                case 11:
                    return "11";
                    break;
                case 12:
                    return "12";
                    break;
            }
        }
    }

    //Format Medium date
    if (!function_exists('mediumdate_indo')) {
        function mediumdate_indo($tgl)
        {
            $ubah = gmdate($tgl, time() + 60 * 60 * 8);
            $pecah = explode("-", $ubah);
            $tanggal = $pecah[2];
            $bulan = medium_bulan($pecah[1]);
            $tahun = $pecah[0];
            return $tanggal . '-' . $bulan . '-' . $tahun;
        }
    }

    if (!function_exists('medium_bulan')) {
        function medium_bulan($bln)
        {
            switch ($bln) {
                case 1:
                    return "Jan";
                    break;
                case 2:
                    return "Feb";
                    break;
                case 3:
                    return "Mar";
                    break;
                case 4:
                    return "Apr";
                    break;
                case 5:
                    return "Mei";
                    break;
                case 6:
                    return "Jun";
                    break;
                case 7:
                    return "Jul";
                    break;
                case 8:
                    return "Ags";
                    break;
                case 9:
                    return "Sep";
                    break;
                case 10:
                    return "Okt";
                    break;
                case 11:
                    return "Nov";
                    break;
                case 12:
                    return "Des";
                    break;
            }
        }
    }

    //Long date indo Format
    if (!function_exists('longdate_indo')) {
        function longdate_indo($tanggal)
        {
            $ubah = gmdate($tanggal, time() + 60 * 60 * 8);
            $pecah = explode("-", $ubah);
            $tgl = $pecah[2];
            $bln = $pecah[1];
            $thn = $pecah[0];
            $bulan = bulan($pecah[1]);

            $nama = date("l", mktime(0, 0, 0, $bln, $tgl, $thn));
            $nama_hari = "";
            if ($nama == "Sunday") {
                $nama_hari = "Minggu";
            } else if ($nama == "Monday") {
                $nama_hari = "Senin";
            } else if ($nama == "Tuesday") {
                $nama_hari = "Selasa";
            } else if ($nama == "Wednesday") {
                $nama_hari = "Rabu";
            } else if ($nama == "Thursday") {
                $nama_hari = "Kamis";
            } else if ($nama == "Friday") {
                $nama_hari = "Jumat";
            } else if ($nama == "Saturday") {
                $nama_hari = "Sabtu";
            }
            return $nama_hari . ',' . $tgl . ' ' . $bulan . ' ' . $thn;
        }
    }
}


function is_read($table, $field = null, $value = null)
{
    $ci = get_instance();
    $data = [
        'is_read' => '1'
    ];
    $ci->Crud_model->edit($table, $field, $value, $data);
}
