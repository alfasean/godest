<?php

function is_logged_in() {
    $CI = get_instance();
    if (!$CI->session->userdata('u_id')) {
        redirect('login');
    }
}

function cek_menu_access() {
    $CI = get_instance();
    if ($CI->session->userdata('role_id')!=1) {
        if ($CI->uri->segment(1)!='') {
            if ($CI->uri->segment(2)!='') {
                if ($CI->uri->segment(3)!='') {
                    if ($CI->uri->segment(4)!='') {
                        $segment = $CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.$CI->uri->segment(3).'/';
                    }else{
                        $segment = $CI->uri->segment(1).'/'.$CI->uri->segment(2).'/'.$CI->uri->segment(3).'/';
                    }
                }else{
                    $segment = $CI->uri->segment(1).'/'.$CI->uri->segment(2).'/';
                }
            }else{
            $segment = $CI->uri->segment(1).'/';
            }
        }else{
            $segment = '';
        }

        $query = $CI->db->query("SELECT * 
            FROM m_role_access a 
            JOIN m_menu b ON a.id_menu=b.menu_id 
            JOIN m_role c ON a.id_role=c.role_id 
            WHERE b.link_url='$segment' 
            AND c.is_status='y' 
            AND c.is_del='n' 
            AND a.id_role=".$CI->session->userdata('role_id'))->num_rows();

        if ($query<1) {
            redirect('dashboard');
        }
    }
}

function pengaturan_sistem(){
    $CI = get_instance();
    $query = $CI->db->query("SELECT * FROM _setting WHERE setting_id='1'")->row_array();
    return $query;
}

function count_data($table, $field = '', $id = ''){
    $CI = get_instance();

    $where = " ";
    if ($id!='') {
        $where = " WHERE $field='$id' ";
    }

    $query = $CI->db->query("SELECT $field FROM $table $where ")->num_rows();
    return $query;
}

function get_data($table, $field, $id, $ex = "*", $field2 = '', $id2 = ''){
    $CI = get_instance();

    $and = "";
    if ($field2!='' && $id2!='') {
        $and = " AND $field2='$id2' ";
    }

    $query = $CI->db->query("SELECT $ex FROM $table WHERE $field='$id' $and ")->row_array();
    return $query;
}

function get_result($table, $field, $id, $ex = "*", $field2 = '', $id2 = ''){
    $CI = get_instance();

    $and = "";
    if ($field2!='' && $id2!='') {
        $and = " AND $field2='$id2' ";
    }

    $query = $CI->db->query("SELECT $ex FROM $table WHERE $field='$id' $and ")->result_array();
    return $query;
}

function auth_login(){
    $CI = get_instance();
    $pid = $CI->session->userdata('u_id');
    $query = $CI->db->query("SELECT * 
        FROM m_admin
        WHERE admin_id='$pid' 
        AND is_del='n' 
        AND is_status='y'")->row_array();

    if ($query) {
        return $query;
    }else{        
        redirect('logout/index/auto');
    }
}

function validate_date($date = null){
    return strtotime($date) !== false;
}

function tgl_time($tgl = null){
    if ($tgl!=null && $tgl!='0000-00-00 00:00:00' && $tgl!='0000-00-00') {
        return substr($tgl,11,5);
    }else{
        return '';
    }
}

function tgl_date($tgl = null){
    if ($tgl!=null && $tgl!='0000-00-00 00:00:00' && $tgl!='0000-00-00') {
        $date = substr($tgl,0,10);
        $BulanIndo = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
        $pecahkan = explode('-', $date);
        $tgl = isset($pecahkan[2]) ? $pecahkan[2] : '';
        $bln = isset($pecahkan[1]) ? $pecahkan[1] : '';
        $thn = isset($pecahkan[0]) ? $pecahkan[0] : '';
        return $tgl . ' ' . $BulanIndo[ (int)$bln-1] . ' ' . $thn;
    }else{
        return '';
    }
}

function tgl_dates($tgl = null){
    if ($tgl!=null) {
        $date = substr($tgl,0,10);
        $BulanIndo = array("January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December");
        $pecahkan = explode('-', $date);
        $tgl = isset($pecahkan[2]) ? $pecahkan[2] : '';
        $bln = isset($pecahkan[1]) ? $pecahkan[1] : '';
        $thn = isset($pecahkan[0]) ? $pecahkan[0] : '';
        return $tgl . ' ' . $BulanIndo[ (int)$bln-1] . ' ' . $thn;
    }else{
        return '';
    }
}

function tgl_today_en(){
    $hari = date ("D");
    switch($hari){
        case 'Sun':
            $hari_ini = "Sunday";
        break;
 
        case 'Mon':         
            $hari_ini = "Monday";
        break;
 
        case 'Tue':
            $hari_ini = "Tuesday";
        break;
 
        case 'Wed':
            $hari_ini = "Wednesday";
        break;
 
        case 'Thu':
            $hari_ini = "Thursday";
        break;
 
        case 'Fri':
            $hari_ini = "Friday";
        break;
 
        case 'Sat':
            $hari_ini = "Saturday";
        break;
        
        default:
            $hari_ini = "Unknown";     
        break;
    }
 
    return $hari_ini;
 
}

function tgl_today_id(){
    $hari = date ("D");
    switch($hari){
        case 'Sun':
            $hari_ini = "Minggu";
        break;
 
        case 'Mon':         
            $hari_ini = "Senin";
        break;
 
        case 'Tue':
            $hari_ini = "Selasa";
        break;
 
        case 'Wed':
            $hari_ini = "Rabu";
        break;
 
        case 'Thu':
            $hari_ini = "Kamis";
        break;
 
        case 'Fri':
            $hari_ini = "Jumat";
        break;
 
        case 'Sat':
            $hari_ini = "Sabtu";
        break;
        
        default:
            $hari_ini = "Unknown";     
        break;
    }
 
    return $hari_ini;
 
}

function get_month($val){
    switch($val){
        case '01':
            $hari_ini = "Januari";
        break;
 
        case '02':         
            $hari_ini = "Februari";
        break;
 
        case '03':
            $hari_ini = "Maret";
        break;
 
        case '04':
            $hari_ini = "April";
        break;
 
        case '05':
            $hari_ini = "Mei";
        break;
 
        case '06':
            $hari_ini = "Juni";
        break;
 
        case '07':
            $hari_ini = "Juli";
        break;

        case '08':
            $hari_ini = "Agustus";
        break;

        case '09':
            $hari_ini = "September";
        break;

        case '10':
            $hari_ini = "Oktober";
        break;

        case '11':
            $hari_ini = "November";
        break;

        case '12':
            $hari_ini = "Desember";
        break;
        
        default:
            $hari_ini = "Unknown";     
        break;
    }
 
    return $hari_ini;
 
}

function urut_id($table,$field){
    $CI = get_instance();
    $query = $CI->db->query("SELECT max($field) as id FROM $table")->row_array();
    $hasilid = $query['id']+1;
    return ($hasilid);
}

function urut_id_where($table,$field,$field2,$where){
    $CI = get_instance();
    $query = $CI->db->query("SELECT max($field) as id FROM $table WHERE $field2='$where'")->row_array();
    $hasilid = $query['id']+1;
    return ($hasilid);
}

function getUserIP() {
    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        return $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        // Bisa berisi beberapa IP, ambil yang pertama
        return explode(',', $_SERVER['HTTP_X_FORWARDED_FOR'])[0];
    } else {
        return $_SERVER['REMOTE_ADDR'];
    }
}

function format_rupiah($jumlah = 0){
    $conv = "Rp ".number_format($jumlah,0,',','.');
    return($conv);
}

function format_rupiahnrp($jumlah = 0,$kutip = 0){
    $conv = number_format($jumlah,$kutip,',','.');
    return($conv);
}

function rand_code($panjang){
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
        $pos = rand(0, strlen($karakter)-1);
        $string .= $karakter[$pos];
    }
    
    return $string;
}

function rand_code_txt($panjang){
    $karakter= 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
        $pos = rand(0, strlen($karakter)-1);
        $string .= $karakter[$pos];
    }
    
    return $string;
}

function rand_numb($panjang){
    $karakter= '123456789';
    $string = '';
    for ($i = 0; $i < $panjang; $i++) {
        $pos = rand(0, strlen($karakter)-1);
        $string .= $karakter[$pos];
    }
    
    return $string;
}

function str_replace_html($txt = null){
    if ($txt!=null) {
      $find = array("<?php","?>","<?","<?=","<script>","<script","</script>","<a>","<a","</a>","<button>","<button","</button>","<ul>","<ul","</ul>","<li>","<li","</li>","<ol>","<ol","</ol>","<style","</style>");
      $replace = "-";
      return str_replace($find,$replace,$txt);
    }else{
      return $txt;
    }
}

function str_replace_berbahaya($txt = null) {
    if ($txt != null) {
        $find = array(
            "<?php", "?>", "<?", "<?=", 
            "<script>", "<script", "</script>", "< script>", "< script", "</ script>", "< / script>", "< /script>",
            "<object>", "<object", "</object>", 
            "<form>", "<form", "</form>",
            "<input>", "<input", "</input>",
            "onerror=", "onload=", "onmouseover=", "onclick=", "onfocus=", 
            "javascript:", "vbscript:", "data:text/html",
            "expression(", "background-image:"
        );

        $replace = array_map("htmlspecialchars", $find);

        return str_replace($find, $replace, $txt);
    } else {
        return $txt;
    }
}

function str_replace_string($txt = null){
  if ($txt!=null) {
    $find = array(' ','"','`');
    $replace = "-";
    return str_replace($find,$replace,$txt);
  }else{
    return $txt;
  }
}

function url_replace($string) {
    $c = array (' ');
    $d = array ('/','\\',',','.','#',':',';','\'','"','[',']','{','}',')','(','|','`','~','!','@','%','$','^','*','?','&','=','+','°');
    $string = str_replace($d, '', $string);
    $string = strtolower(str_replace($c, '-', $string));
    return $string;
}

function url_replace_dash($nama, $id = '') {
    $CI =& get_instance(); // Ambil instance CodeIgniter
    $slug = url_title($nama, 'dash', true);
    $original_slug = $slug;
    $i = 1;

    // Cek apakah slug sudah ada di database
    while (true) {
        $CI->db->where('slug', $slug);

        // Tambahkan pengecualian jika sedang dalam mode edit
        if (!empty($id)) {
            $CI->db->where('wisata_id !=', $id);
        }

        $exists = $CI->db->get('m_wisata')->num_rows();

        if ($exists == 0) {
            break;
        }

        $slug = $original_slug . '-' . $i;
        $i++;
    }

    return $slug;
}


function str_replace_num($txt = null){
    if ($txt!=null) {
      $find = array(' ','(',')','-');
      $replace = "";
      return str_replace($find,$replace,$txt);
    }else{
      return $txt;
    }
  }

function detik_ke_menit($waktu){
    $result = $waktu/60;
    return $result;
}

function hitung_bulan($tgl1,$tgl2){ 
    //convert
    $timeStart = strtotime($tgl1);
    $timeEnd = strtotime($tgl2);
    // Menambah bulan ini + semua bulan pada tahun sebelumnya
    $numBulan = 1 + (date("Y",$timeEnd)-date("Y",$timeStart))*12;
    // hitung selisih bulan
    $numBulan += date("m",$timeEnd)-date("m",$timeStart);
    return $numBulan;
}

function converted_time($tambah,$date = null){ 
    if ($date==null) {
        $startTime = date("Y-m-d H:i:s");
    }else{
        $startTime = $date;
    }
    //add time
    $cenvertedTime = date('Y-m-d H:i:s',strtotime($tambah,strtotime($startTime)));
    //display the converted time
    return $cenvertedTime;
}

function number_format_short_2($num, $precision = 2) {
    if ($num >= 1000 && $num < 1000000) {
       $n_format = number_format($num/1000, $precision).'K';
    } else if ($num >= 1000000 && $num < 1000000000) {
       $n_format = number_format($num/1000000, $precision).'M';
    } else if ($num >= 1000000000) {
       $n_format = number_format($num/1000000000, $precision).'B';
    } else {
       $n_format = $num;
    }
       return $n_format;
}

function time_ago($time_ago) {
    $time_ago = strtotime($time_ago);
    $cur_time   = time();
    $time_elapsed   = $cur_time - $time_ago;
    $seconds    = $time_elapsed ;
    $minutes    = round($time_elapsed / 60 );
    $hours      = round($time_elapsed / 3600);
    $days       = round($time_elapsed / 86400 );
    $weeks      = round($time_elapsed / 604800);
    $months     = round($time_elapsed / 2600640 );
    $years      = round($time_elapsed / 31207680 );
    // Seconds
    if($seconds <= 60){
        return "just now";
    }
    //Minutes
    else if($minutes <=60){
        if($minutes==1){
            return "1 minute ago";
        }
        else{
            return "$minutes minutes ago";
        }
    }
    //Hours
    else if($hours <=24){
        if($hours==1){
            return "an hour ago";
        }else{
            return "$hours hrs ago";
        }
    }
    //Days
    else if($days <= 7){
        if($days==1){
            return "yesterday";
        }else{
            return "$days days ago";
        }
    }
    //Weeks
    else if($weeks <= 4.3){
        if($weeks==1){
            return "a week ago";
        }else{
            return "$weeks weeks ago";
        }
    }
    //Months
    else if($months <=12){
        if($months==1){
            return "a month ago";
        }else{
            return "$months months ago";
        }
    }
    //Years
    else{
        if($years==1){
            return "one year ago";
        }else{
            return "$years years ago";
        }
    }
}

function resizeImagev2($resourceType,$image_width,$image_height,$resizeWidth,$resizeHeight) {
    // $resizeWidth = 100;
    // $resizeHeight = 100;
    $imageLayer = imagecreatetruecolor($resizeWidth,$resizeHeight);
    imagecopyresampled($imageLayer,$resourceType,0,0,0,0,$resizeWidth,$resizeHeight, $image_width,$image_height);
    return $imageLayer;
}

function resizeImgv2($source_image, $dir){
    list( $width, $height ) = getimagesize($source_image);

    $width_size = $width*50/100; // compress 50%
    $k = $width / $width_size;
    $new_width = $width / $k;
    $new_height = $height / $k;

    $fileName = $source_image;
    $sourceProperties = getimagesize($fileName);
    $uploadPath = $dir;
    $uploadImageType = $sourceProperties[2];
    $sourceImageWidth = $sourceProperties[0];
    $sourceImageHeight = $sourceProperties[1];
    switch ($uploadImageType) {
        case IMAGETYPE_JPEG:
            $resourceType = imagecreatefromjpeg($fileName);
            $imageLayer = resizeImagev2($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
            imagejpeg($imageLayer,$uploadPath);
            break;

        case IMAGETYPE_GIF:
            $resourceType = imagecreatefromgif($fileName);
            $imageLayer = resizeImagev2($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
            imagegif($imageLayer,$uploadPath);
            break;

        case IMAGETYPE_PNG:
            $resourceType = imagecreatefrompng($fileName);
            $imageLayer = resizeImagev2($resourceType,$sourceImageWidth,$sourceImageHeight,$new_width,$new_height);
            imagepng($imageLayer,$uploadPath);
            break;

        default:
            break;
    }
}

?>