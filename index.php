<?php
$userId = $_REQUEST['user_id'];
$lang = $_REQUEST['lang'] ?? 'ru';

$messages = [
  'ru' => [
    'please' => 'Пожалуйста нажмите кнопку "Разрешить"',
    'please2' => 'чтобы получать уведомления о новых<br /> бонусах, акциях и турнирах.',
  ],
  'en' => [
    'please' => 'Please tap the "Allow" button',
    'please2' => 'to receive notifications about new<br /> bonuses, promotions, and tournaments.',
  ]
];
?>
<html lang="<?php echo $lang?>">
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link href='https://fonts.googleapis.com/css?family=Roboto Condensed' rel='stylesheet'>
<link rel="stylesheet" href="styles.css"/>
<script type="text/javascript" src="//code.jquery.com/jquery-3.7.1.min.js"></script>
<script type="text/javascript" src="//www.gstatic.com/firebasejs/3.6.8/firebase.js"></script>
<script type="text/javascript" src="ubid/build/ubid-0.0.1.min.js"></script>
<script type="text/javascript" src="firebase_subscribe.js"></script>

<body>
  <div class="bg__d_1920">
    <div class="container">
      <div class="container-logo-text">
        <div class="arrow">
          <svg width="76" height="318" viewBox="0 0 76 318" fill="none" xmlns="http://www.w3.org/2000/svg">
            <path
              d="M75.547 305.5L64 293.953L52.453 305.5L63.9999 317.047L75.547 305.5ZM55.7496 305.5L55.7496 303.5L55.7496 305.5ZM11.7498 261.5L13.7498 261.5L11.7498 261.5ZM11.7498 0.5L0.202791 20.5H23.2968L11.7498 0.5ZM64 303.5L55.7496 303.5L55.7496 307.5L64 307.5L64 303.5ZM13.7498 261.5L13.7498 18.5H9.74979L9.74978 261.5L13.7498 261.5ZM55.7496 303.5C32.5537 303.5 13.7498 284.696 13.7498 261.5L9.74978 261.5C9.74978 286.905 30.3445 307.5 55.7496 307.5L55.7496 303.5Z"
              fill="#D3B775" />
          </svg>
        </div>

        <div class="block-logo-text">
          <div class="logo">
            <svg width="249" height="65" viewBox="0 0 249 65" fill="none" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M31.8983 5.80697C32.7585 5.80697 33.4558 5.10967 33.4558 4.24951C33.4558 3.38935 32.7585 2.69205 31.8983 2.69205C31.0381 2.69205 30.3408 3.38935 30.3408 4.24951C30.3408 5.10967 31.0381 5.80697 31.8983 5.80697Z"
                fill="#3D2600" />
              <path
                d="M50.0439 8.25239C46.0457 5.35369 41.3094 3.41514 36.1722 2.78387L35.8896 6.08602C40.3153 6.65599 44.3905 8.33275 47.8675 10.7998L50.0439 8.25239Z"
                fill="#3D2600" />
              <path
                d="M12.1564 14.2722C13.0189 14.2722 13.7156 13.5763 13.7156 12.7164C13.7156 11.8548 13.0197 11.1589 12.1564 11.1589C11.7521 11.1589 11.386 11.3163 11.1109 11.569C11.0471 11.6336 10.9908 11.7049 10.9278 11.7695C10.7265 12.0329 10.6006 12.3577 10.6006 12.7164C10.6014 13.5755 11.2973 14.2722 12.1564 14.2722Z"
                fill="#3D2600" />
              <path
                d="M27.986 6.24201L27.5519 2.96637C22.6366 3.78652 18.1315 5.81868 14.333 8.72898L16.3586 11.3029C19.7072 8.75549 23.6672 6.97435 27.986 6.24201Z"
                fill="#3D2600" />
              <path
                d="M58.821 28.3654L62.1025 28.0754C61.3271 22.8828 59.2302 18.1168 56.1409 14.1494L53.668 16.3804C56.2983 19.8184 58.111 23.9092 58.821 28.3654Z"
                fill="#3D2600" />
              <path
                d="M10.8251 16.9676L8.21545 15.0042C5.47657 18.7951 3.60011 23.2488 2.88184 28.0777L6.10785 28.4431C6.76648 24.2089 8.42091 20.3004 10.8251 16.9676Z"
                fill="#3D2600" />
              <path
                d="M52.1426 13.7717C53.0023 13.7717 53.6993 13.0748 53.6993 12.2151C53.6993 11.3553 53.0023 10.6584 52.1426 10.6584C51.2829 10.6584 50.5859 11.3553 50.5859 12.2151C50.5859 13.0748 51.2829 13.7717 52.1426 13.7717Z"
                fill="#3D2600" />
              <path
                d="M60.8185 30.8271C59.9586 30.8271 59.2627 31.5222 59.2627 32.3838C59.2627 33.2445 59.9586 33.9404 60.8185 33.9404C61.681 33.9404 62.3777 33.2445 62.3777 32.3838C62.3777 31.5239 61.6818 30.8271 60.8185 30.8271Z"
                fill="#3D2600" />
              <path
                d="M52.2891 51.279C51.4292 51.279 50.7324 51.9741 50.7324 52.8356C50.7324 53.6964 51.43 54.3923 52.2891 54.3923C52.695 54.3923 53.0612 54.234 53.3379 53.9814C53.3727 53.9474 53.4059 53.9134 53.439 53.8795C53.6908 53.6036 53.8483 53.2399 53.8483 52.8356C53.8483 51.9749 53.1523 51.279 52.2891 51.279Z"
                fill="#3D2600" />
              <path
                d="M4.21795 33.9547C5.06712 33.9547 5.75226 33.2795 5.77297 32.4379C5.77297 32.4196 5.77628 32.4022 5.77628 32.3848C5.768 31.5291 5.07624 30.8415 4.21878 30.8415C3.35884 30.8415 2.66211 31.5365 2.66211 32.3989C2.66128 33.258 3.35884 33.9547 4.21795 33.9547Z"
                fill="#3D2600" />
              <path
                d="M36.0332 58.9936L36.1757 62.2005C41.3494 61.5617 46.123 59.6215 50.136 56.6847L47.9415 54.2798C44.4909 56.7469 40.429 58.4004 36.0332 58.9936Z"
                fill="#3D2600" />
              <path
                d="M53.75 48.6048L56.2437 50.7131C59.3487 46.672 61.4538 41.8232 62.1705 36.5361L58.8806 36.3994C58.2228 40.9401 56.3986 45.1021 53.75 48.6048Z"
                fill="#3D2600" />
              <path
                d="M31.8986 59.2958C31.0387 59.2958 30.3428 59.9909 30.3428 60.8533C30.3428 61.7132 31.0387 62.4091 31.8986 62.4091C32.761 62.4091 33.4578 61.7132 33.4578 60.8533C33.4578 59.9926 32.7619 59.2958 31.8986 59.2958Z"
                fill="#3D2600" />
              <path
                d="M14.1328 56.1286C18.0042 59.145 22.6303 61.2359 27.6798 62.0569L27.9523 58.8625C23.6211 58.121 19.6578 56.3158 16.3017 53.7518L14.1328 56.1286Z"
                fill="#3D2600" />
              <path
                d="M6.06808 36.5L2.85449 36.6334C3.5446 41.5941 5.43514 46.1745 8.25107 50.0524L10.6967 47.9855C8.319 44.6435 6.69937 40.7308 6.06808 36.5Z"
                fill="#3D2600" />
              <path
                d="M12.1379 50.6055C11.2779 50.6055 10.582 51.3006 10.582 52.1621C10.582 53.0229 11.2779 53.7188 12.1379 53.7188C13.0003 53.7188 13.697 53.0229 13.697 52.1621C13.697 51.3014 13.0011 50.6055 12.1379 50.6055Z"
                fill="#3D2600" />
              <path
                d="M56.7136 32.5551C56.7136 19.1833 45.8351 8.30588 32.4638 8.30588C19.0933 8.30588 8.21484 19.1841 8.21484 32.5551C8.21484 45.9252 19.0933 56.8034 32.4638 56.8034C45.836 56.8034 56.7136 45.9252 56.7136 32.5551Z"
                fill="#115417" />
              <path
                d="M32.4979 0C14.5784 0 0 14.5788 0 32.4988C0 50.4195 14.5784 65 32.4979 65C50.42 65 65 50.4195 65 32.4988C65 14.5788 50.42 0 32.4979 0ZM56.1405 14.1489C59.2306 18.1163 61.3274 22.8814 62.1021 28.0749L58.8205 28.3649C58.1114 23.9095 56.2979 19.8179 53.6667 16.3807L56.1405 14.1489ZM62.3779 32.3844C62.3779 33.2452 61.682 33.9411 60.8188 33.9411C59.9588 33.9411 59.2629 33.2452 59.2629 32.3844C59.2629 31.5229 59.9588 30.8278 60.8188 30.8278C61.682 30.827 62.3779 31.5237 62.3779 32.3844ZM10.9274 11.7688C10.9903 11.7042 11.0467 11.6329 11.1105 11.5683C11.3863 11.3156 11.7525 11.1582 12.156 11.1582C13.0184 11.1582 13.7151 11.8541 13.7151 12.7157C13.7151 13.5756 13.0192 14.2715 12.156 14.2715C11.296 14.2715 10.6001 13.5756 10.6001 12.7157C10.601 12.3561 10.726 12.0314 10.9274 11.7688ZM32.464 8.30508C45.8361 8.30508 56.7138 19.1833 56.7138 32.5543C56.7138 45.9244 45.8353 56.8026 32.464 56.8026C19.0935 56.8026 8.21499 45.9244 8.21499 32.5543C8.21499 19.1833 19.0935 8.30508 32.464 8.30508ZM52.1423 10.6578C53.0048 10.6578 53.7015 11.3537 53.7015 12.2153C53.7015 13.0752 53.0056 13.7711 52.1423 13.7711C51.2824 13.7711 50.5857 13.0752 50.5857 12.2153C50.5857 11.3529 51.2824 10.6578 52.1423 10.6578ZM36.1721 2.78355C41.3094 3.41482 46.0457 5.35336 50.0438 8.25206L47.8667 10.7995C44.3896 8.33242 40.3153 6.65566 35.8888 6.0857L36.1721 2.78355ZM31.8981 2.69159C32.7606 2.69159 33.4573 3.38914 33.4573 4.24905C33.4573 5.10897 32.7614 5.80569 31.8981 5.80569C31.0382 5.80569 30.3423 5.1098 30.3423 4.24905C30.3423 3.38831 31.039 2.69159 31.8981 2.69159ZM27.9861 6.24145C23.6674 6.97378 19.7074 8.7541 16.3596 11.3015L14.334 8.72758C18.1316 5.81811 22.6368 3.78596 27.552 2.9658L27.9861 6.24145ZM8.21499 15.0047L10.8246 16.968C8.42045 20.3009 6.76602 24.2086 6.10656 28.4436L2.88055 28.0782C3.59965 23.2493 5.47528 18.7956 8.21499 15.0047ZM4.21768 30.8402C5.07513 30.8402 5.76773 31.5278 5.77518 32.3836C5.77518 32.401 5.77187 32.4184 5.77187 32.4366C5.75116 33.2775 5.06685 33.9535 4.21685 33.9535C3.35691 33.9535 2.66018 33.2576 2.66018 32.3977C2.66101 31.5353 3.35857 30.8402 4.21768 30.8402ZM8.25062 50.0517C5.43551 46.1738 3.54414 41.5933 2.85404 36.6327L6.06763 36.4993C6.69891 40.7301 8.31855 44.6428 10.6962 47.9847L8.25062 50.0517ZM12.1377 53.7183C11.2778 53.7183 10.5819 53.0225 10.5819 52.1617C10.5819 51.3001 11.2778 50.6051 12.1377 50.6051C13.0002 50.6051 13.6969 51.301 13.6969 52.1617C13.6969 53.0225 13.001 53.7183 12.1377 53.7183ZM27.6796 62.0566C22.631 61.2364 18.0041 59.1446 14.1327 56.1283L16.3016 53.7507C19.6577 56.3138 23.621 58.1198 27.9522 58.8613L27.6796 62.0566ZM31.8981 62.4095C31.0382 62.4095 30.3423 61.7136 30.3423 60.8537C30.3423 59.9913 31.0382 59.2962 31.8981 59.2962C32.7606 59.2962 33.4573 59.9921 33.4573 60.8537C33.4573 61.7128 32.7614 62.4095 31.8981 62.4095ZM36.1763 62.2007L36.0338 58.9938C40.4296 58.4007 44.4915 56.7471 47.9421 54.28L50.1366 56.685C46.1236 59.6218 41.3492 61.562 36.1763 62.2007ZM53.4389 53.8791C53.4057 53.913 53.3734 53.947 53.3378 53.981C53.0611 54.2336 52.6949 54.3919 52.289 54.3919C51.429 54.3919 50.7323 53.696 50.7323 52.8352C50.7323 51.9737 51.4299 51.2786 52.289 51.2786C53.1514 51.2786 53.8481 51.9745 53.8481 52.8352C53.8481 53.2395 53.6907 53.6032 53.4389 53.8791ZM56.2432 50.7128L53.7495 48.6044C56.3981 45.1009 58.2224 40.9397 58.881 36.399L62.1708 36.5357C61.4534 41.822 59.3483 46.6717 56.2432 50.7128Z"
                fill="#D3B775" />
              <path d="M31.9564 46.5922L11.7412 32.4118L31.9564 18.2298L52.1683 32.4118L31.9564 46.5922Z"
                fill="#3D2600" />
              <path
                d="M31.9564 46.5922L11.7412 32.4118L31.9564 18.2298L52.1683 32.4118L31.9564 46.5922ZM15.6963 32.4118L31.9564 43.8186L48.2157 32.4118L31.9564 21.0043L15.6963 32.4118Z"
                fill="#D3B775" />
              <path
                d="M32.017 36.4836C29.7072 36.4836 27.8291 34.6039 27.8291 32.2942C27.8291 29.9854 29.708 28.1073 32.017 28.1073C34.3267 28.1073 36.2056 29.9862 36.2056 32.2942C36.2056 34.6039 34.3267 36.4836 32.017 36.4836ZM32.017 30.378C30.9598 30.378 30.0991 31.238 30.0991 32.295C30.0991 33.353 30.9598 34.2137 32.017 34.2137C33.0741 34.2137 33.9348 33.353 33.9348 32.295C33.9348 31.238 33.0741 30.378 32.017 30.378Z"
                fill="#D3B775" />
              <path
                d="M47.9941 37.4305C47.6006 36.9326 47.1549 36.5424 46.705 36.2442L44.5494 37.7569C44.9678 37.8381 45.6612 38.1579 46.2038 38.8446C46.8608 39.6764 47.0141 40.871 46.5791 41.7508C45.6794 43.5618 43.7988 43.9801 42.7525 43.7001C42.0375 43.5112 40.3748 42.7764 40.3748 40.0724C40.3748 37.3551 39.6747 35.8109 38.0891 35.0753C41.8312 33.0232 44.4168 29.1718 44.4168 24.8639C44.4168 17.6698 37.959 13.2178 31.9759 13.2178C27.7516 13.2178 23.4361 15.6443 21.1935 19.2024C19.5291 19.0798 17.6601 19.6282 16.4497 21.3323C15.4705 22.7059 15.1366 24.3362 15.5086 25.9227C15.7547 26.9748 16.2965 27.9258 17.0529 28.6855L18.9674 27.3426C18.3502 26.8447 17.907 26.1687 17.7281 25.4033C17.5731 24.738 17.5458 23.7224 18.3072 22.6537C19.5316 20.9313 21.7809 21.435 22.524 21.942C23.0998 22.3356 23.9697 22.9312 23.9697 24.9037C23.9697 26.356 23.9266 30.7052 23.8893 34.5285C23.8595 37.5341 23.833 40.2149 23.833 40.9157C23.833 42.0399 22.8562 43.1691 21.4569 43.6603C20.3907 44.034 18.4637 43.493 17.7488 41.7549C17.1142 40.2124 17.5947 38.7444 19.0818 37.5639L17.1672 36.221C15.3015 37.993 14.7025 40.3425 15.6403 42.6231C16.5666 44.8748 18.8026 46.0462 20.7726 46.0454C21.2797 46.0454 21.7693 45.9684 22.2142 45.8118C24.5463 44.9925 26.1145 43.0241 26.1145 40.9166C26.1145 40.243 26.1394 37.7279 26.1667 34.8615C28.1956 36.0536 30.1309 36.6443 32.0372 36.6443C33.2732 36.6443 34.472 36.4579 35.6087 36.1199C37.3269 36.4786 38.094 37.7072 38.094 40.0749C38.094 43.5775 40.1975 45.3835 42.1651 45.9062C42.5536 46.0098 42.9737 46.0636 43.407 46.0636C45.3099 46.0636 47.4921 45.0389 48.6204 42.7665C49.4481 41.0972 49.1962 38.9548 47.9941 37.4305ZM32.038 34.3611C30.2171 34.3611 28.2992 33.6354 26.1941 32.1641C26.2239 29.0575 26.2521 26.0602 26.2521 24.9029C26.2521 21.7275 24.543 20.5594 23.7998 20.0507C23.707 19.9869 23.606 19.9273 23.5024 19.8701C25.4162 17.2821 28.783 15.4993 31.9767 15.4993C36.863 15.4993 42.1369 19.0798 42.1369 24.8648C42.1369 30.0118 37.5125 34.3611 32.038 34.3611Z"
                fill="#D3B775" />
              <path
                d="M22.0369 36.8572C22.317 37.0544 22.9748 37.515 22.9748 37.515V40.3118L21.7246 39.4237L22.0369 36.8572Z"
                fill="#D3B775" />
              <path
                d="M22.3599 27.7428C22.7087 27.51 23.0243 27.3111 23.0243 27.3111V24.4688L22.1934 25.0835L22.3599 27.7428Z"
                fill="#D3B775" />
              <path
                d="M36.7136 43.2401C37.026 43.0263 37.4046 42.7463 37.4046 42.7463C37.4046 42.7463 37.2397 42.1043 37.1743 41.3645C37.1188 40.7415 37.1577 40.1467 37.1577 40.1467C37.1577 40.1467 36.5156 40.6238 36.253 40.8044C35.9896 40.9859 36.7136 43.2401 36.7136 43.2401Z"
                fill="#D3B775" />
              <path
                d="M39.9043 26.5745C40.1677 26.7551 40.8753 27.2489 40.8753 27.2489C40.8753 27.2489 41.0401 26.6234 41.1056 25.9159C41.171 25.2084 41.1387 24.6658 41.1387 24.6658L40.1189 23.9583L39.9043 26.5745Z"
                fill="#D3B775" />
              <path
                d="M79.7725 46.9848V18.0152C79.7725 17.7096 79.8276 17.4194 79.939 17.1479C80.0504 16.8776 80.2075 16.639 80.4081 16.4393C80.6074 16.2383 80.842 16.0808 81.1058 15.9692C81.3673 15.8575 81.6605 15.8023 81.9806 15.8023H90.0194C91.422 15.8023 92.7448 16.0726 93.9878 16.6155C95.2297 17.1573 96.3121 17.8965 97.2362 18.8272C98.1614 19.758 98.892 20.8486 99.4349 22.0943C99.9756 23.3388 100.246 24.6632 100.246 26.0699C100.246 26.9889 100.133 27.8833 99.9017 28.7517C99.673 29.6202 99.3318 30.4416 98.8826 31.2137C98.4311 31.9858 97.8682 32.7039 97.1951 33.3643C96.522 34.0236 95.7398 34.6053 94.8521 35.106L101.495 45.7708C101.733 46.1598 101.851 46.5653 101.851 46.9813C101.851 47.3021 101.796 47.5947 101.683 47.8591C101.572 48.1236 101.417 48.3574 101.215 48.5584C101.013 48.7593 100.778 48.9156 100.507 49.0273C100.236 49.1401 99.9474 49.1953 99.6425 49.1953C98.8639 49.1953 98.2329 48.8322 97.7463 48.1095L90.3947 36.3199H84.1888V46.9848C84.1888 47.5982 83.973 48.1212 83.5427 48.5513C83.1123 48.9814 82.5916 49.1989 81.9806 49.1989C81.3685 49.1989 80.849 48.9826 80.4174 48.5513C79.9871 48.1212 79.7725 47.5994 79.7725 46.9848ZM84.1876 20.2269V31.8954H90.0194C90.8239 31.8954 91.5826 31.7414 92.2897 31.4359C92.9981 31.1303 93.6137 30.7072 94.1332 30.1737C94.6539 29.6378 95.069 29.0185 95.3728 28.3157C95.6777 27.613 95.8313 26.8655 95.8313 26.0711C95.8313 25.2649 95.6777 24.5058 95.3728 23.7959C95.0679 23.0861 94.6504 22.468 94.1215 21.938C93.595 21.4103 92.9769 20.9919 92.2686 20.6864C91.5603 20.3808 90.811 20.2269 90.0183 20.2269H84.1876Z"
                fill="#D2B77F" />
              <path
                d="M114.924 46.986C114.924 47.5983 114.708 48.12 114.278 48.5513C113.849 48.9838 113.327 49.1989 112.716 49.1989C112.104 49.1989 111.584 48.9838 111.153 48.5513C110.724 48.1212 110.508 47.5983 110.508 46.986V18.014C110.508 17.4018 110.722 16.88 111.153 16.4487C111.584 16.0186 112.104 15.8011 112.716 15.8011C113.327 15.8011 113.848 16.0174 114.278 16.4487C114.707 16.8788 114.924 17.4018 114.924 18.014V46.986Z"
                fill="#D2B77F" />
              <path
                d="M156.724 32.5007C156.724 37.1063 155.09 41.0455 151.829 44.3137C148.58 47.5701 144.657 49.199 140.061 49.199C135.451 49.199 131.523 47.5701 128.273 44.3137C125.024 41.0584 123.398 37.1215 123.398 32.5007C123.398 27.8963 125.024 23.9641 128.273 20.7088C131.535 17.4383 135.465 15.8036 140.061 15.8036C144.644 15.8036 148.567 17.4383 151.829 20.7088C153.467 22.3506 154.692 24.1451 155.506 26.0935C156.317 28.0408 156.724 30.1762 156.724 32.5007ZM140.061 20.227C138.34 20.227 136.767 20.5267 135.343 21.1248C133.921 21.723 132.604 22.6267 131.397 23.8372C130.189 25.0476 129.29 26.3638 128.699 27.7823C128.108 29.2019 127.814 30.7743 127.814 32.4995C127.814 35.8946 129.007 38.7891 131.396 41.183C133.784 43.5757 136.672 44.772 140.06 44.772C143.448 44.772 146.336 43.5757 148.724 41.183C151.113 38.7891 152.306 35.8946 152.306 32.4995C152.306 29.1185 151.113 26.231 148.724 23.8372C146.322 21.4304 143.435 20.227 140.061 20.227Z"
                fill="#D2B77F" />
              <path
                d="M172.84 15.8023C174.021 15.8023 175.134 16.028 176.183 16.4804C177.232 16.9329 178.149 17.5522 178.932 18.3384C179.717 19.1246 180.335 20.0424 180.786 21.0942C181.238 22.1448 181.464 23.2624 181.464 24.4435C181.464 26.56 180.811 28.4027 179.504 29.9751C180.351 30.4757 181.095 31.0528 181.734 31.7073C182.372 32.3619 182.911 33.0753 183.348 33.8462C183.786 34.6183 184.117 35.4327 184.337 36.2894C184.56 37.1438 184.671 38.0252 184.671 38.9289C184.671 40.3344 184.4 41.6612 183.86 42.9057C183.318 44.1502 182.586 45.2397 181.661 46.1728C180.738 47.1035 179.655 47.8415 178.413 48.3845C177.17 48.9262 175.847 49.1977 174.444 49.1977H166.405C166.101 49.1977 165.814 49.1378 165.551 49.0202C165.287 48.9027 165.053 48.7452 164.853 48.5502C164.652 48.3551 164.492 48.1224 164.374 47.8509C164.257 47.5795 164.197 47.2904 164.197 46.9848V18.014C164.197 17.7085 164.257 17.4206 164.374 17.1479C164.492 16.8764 164.651 16.6438 164.853 16.4487C165.053 16.2536 165.287 16.0961 165.551 15.9786C165.814 15.8611 166.101 15.8011 166.405 15.8011H172.84V15.8023ZM168.612 20.2269V28.6812H172.84C173.424 28.6812 173.969 28.5684 174.476 28.3463C174.984 28.123 175.427 27.8163 175.809 27.4273C176.192 27.0383 176.493 26.5894 176.715 26.0805C176.937 25.5717 177.049 25.0276 177.049 24.4423C177.049 23.8712 176.937 23.3341 176.715 22.8253C176.494 22.3164 176.188 21.8675 175.799 21.4785C175.411 21.0895 174.963 20.7828 174.455 20.5595C173.947 20.3386 173.41 20.2257 172.84 20.2257H168.612V20.2269ZM168.612 33.1058V44.7743H174.444C175.249 44.7743 176.007 44.6203 176.715 44.3148C177.423 44.0092 178.037 43.5909 178.558 43.0608C179.079 42.5332 179.494 41.9139 179.798 41.204C180.102 40.4942 180.256 39.7351 180.256 38.9277C180.256 38.1356 180.102 37.3847 179.798 36.6749C179.493 35.9651 179.075 35.3469 178.546 34.8169C178.02 34.2869 177.402 33.8709 176.693 33.5653C175.985 33.2598 175.236 33.1058 174.443 33.1058H168.612Z"
                fill="#D2B77F" />
              <path
                d="M213.306 44.7731C213.917 44.7731 214.438 44.9893 214.868 45.4206C215.3 45.8508 215.514 46.3737 215.514 46.986C215.514 47.5994 215.3 48.12 214.868 48.5525C214.439 48.9826 213.917 49.1989 213.306 49.1989H194.041C193.721 49.1989 193.429 49.1436 193.165 49.032C192.902 48.9203 192.668 48.7629 192.468 48.5619C192.267 48.3621 192.111 48.1271 192 47.8627C191.887 47.6006 191.832 47.3068 191.832 46.986V18.0152C191.832 17.7085 191.887 17.4194 192 17.1479C192.111 16.8776 192.266 16.6391 192.468 16.4381C192.668 16.2383 192.902 16.0808 193.165 15.9692C193.429 15.8576 193.721 15.8011 194.041 15.8011H213.306C213.917 15.8011 214.438 16.0174 214.868 16.4487C215.3 16.8811 215.514 17.4018 215.514 18.0152C215.514 18.6275 215.3 19.1493 214.868 19.5806C214.439 20.0107 213.917 20.2281 213.306 20.2281H196.248V30.2889H208.495C209.106 30.2889 209.626 30.5039 210.057 30.9364C210.486 31.3665 210.703 31.8895 210.703 32.5018C210.703 33.114 210.487 33.6358 210.057 34.0671C209.628 34.4996 209.106 34.7147 208.495 34.7147H196.248V44.7755H213.306V44.7731Z"
                fill="#D2B77F" />
              <path
                d="M245.856 20.2269H237.629V46.9848C237.629 47.5983 237.413 48.1212 236.983 48.5513C236.553 48.9815 236.032 49.1989 235.42 49.1989C234.809 49.1989 234.288 48.9826 233.858 48.5513C233.428 48.12 233.212 47.5983 233.212 46.9848V20.2269H224.985C224.374 20.2269 223.854 20.0107 223.422 19.5794C222.993 19.1493 222.778 18.6263 222.778 18.014C222.778 17.4018 222.993 16.88 223.422 16.4475C223.854 16.0174 224.374 15.8011 224.985 15.8011H245.854C246.465 15.8011 246.986 16.0162 247.417 16.4475C247.848 16.88 248.063 17.4018 248.063 18.014C248.063 18.6263 247.848 19.1481 247.417 19.5794C246.987 20.0107 246.467 20.2269 245.856 20.2269Z"
                fill="#D2B77F" />
            </svg>
          </div>

          <div class="please">
            <?php echo $messages[$lang]['please']?>
          </div>

          <div class="please2">
            <?php echo $messages[$lang]['please2']?>
          </div>
        </div>
      </div>

      <div class="container-bell">
        <div>
          <img src="bell.png" />
        </div>
      </div>
    </div>
  </div>

  <p><button type="button" id="subscribe">Следить за изменениями</button></p>

  <form action="php/index.php" method="POST" target="_blank">
    <div><input type="text" name="token" readonly id="token" /></div>
    <div><input type="text" name="title" placeholder="title"/></div>
    <div><input type="text" name="body" placeholder="body"/></div>
    <div><input type="submit" value="send"/></div>
  </form>

</body>

</html>