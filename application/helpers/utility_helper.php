<?php
 function get_unique_no($length = 10)
 {
   return substr(md5(microtime(true) . mt_Rand()), 0, $length);
 }

 function is_login_user($user_id)
 {
   $CI = &get_instance();
   if ($user_id == $CI->session->user_login["public_key"]) {

     return true;
   }
   return false;
 }

  function is_login()
 {
   $CI = &get_instance();
   if (!empty($CI->session->user_login)) {
     return true;
   }
   return false;
 }

 function is_follow($follow_id , $following_id)
 {
   $CI = &get_instance();
   $user_info = $CI->Shared_M->fetch_all('user_follow' , array() ,array('follow_id'=>$follow_id ,'following_id'=>$following_id),1);
   if (!empty($user_info)) {
     return true;
   }
   return false;
 }

 function tease($body, $sentencesToDisplay = 2) {
   $nakedBody = preg_replace('/\s+/',' ',strip_tags($body));
   $sentences = preg_split('/(\.|\?|\!)(\s)/',$nakedBody);

   if (count($sentences) <= $sentencesToDisplay)
       return $nakedBody;

   $stopAt = 0;
   foreach ($sentences as $i => $sentence) {
       $stopAt += strlen($sentence);

       if ($i >= $sentencesToDisplay - 1)
           break;
   }

   $stopAt += ($sentencesToDisplay * 2);
   return trim(substr($nakedBody, 0, $stopAt));
}

 ?>
