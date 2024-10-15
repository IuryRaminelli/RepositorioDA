<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>@codewith_muhilan</title>
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">


  <style>
    * {
      margin: 0;
      padding: 0;
      box-sizing: border-box;
    }

    html,
    body {
      height: 100%;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: #000000;
      color: #fff;
      display: grid;
      place-items: center;
    }

    html,
    body {
      height: 100%;
    }

    .list {
      list-style: none;
      display: flex;
      align-items: center;
      gap: 40px;
    }

    .link {
      position: relative;
      display: inline-block;
      text-decoration: none;
      color: #fff;
      font-weight: 700;
    }

    .link::before,
    .link::after {
      content: '';
      left: 0;
      position: absolute;
      width: 100%;
      height: 2px;
      background-color: #00fffc;
      transform: scaleX(0);
      transition: transform 0.25s;
    }

    .link::before {
      top: -3px;
      transform-origin: left;
    }

    .link::after {
      bottom: -3px;
      transform-origin: right;
    }

    .link:hover::before,
    .link:hover::after,
    .active::before,
    .active::after {
      transform: scaleX(1);
    }


    .name {
      position: absolute;
      top: 70%;
      font-size: 11px;
      color: #00fffc;
      font-weight: 800;
    }

    /* -- YouTube Link Styles -- */

    #source-link {
      top: 60px;
    }

    #source-link>i {
      color: rgb(94, 106, 210);
    }

    #yt-link {
      top: 10px;
    }

    #yt-link>i {
      color: rgb(219, 31, 106);

    }

    .meta-link {
      align-items: center;
      backdrop-filter: blur(3px);
      background-color: rgba(255, 255, 255, 0.05);
      border: 1px solid rgba(255, 255, 255, 0.1);
      border-radius: 6px;
      box-shadow: 2px 2px 2px rgba(0, 0, 0, 0.1);
      cursor: pointer;
      display: inline-flex;
      gap: 5px;
      left: 10px;
      padding: 10px 20px;
      position: fixed;
      text-decoration: none;
      transition: background-color 600ms, border-color 600ms;
      z-index: 10000;
    }

    .meta-link:hover {
      background-color: rgba(255, 255, 255, 0.1);
      border: 1px solid rgba(255, 255, 255, 0.2);
    }

    .meta-link>i,
    .meta-link>span {
      height: 20px;
      line-height: 20px;
    }

    .meta-link>span {
      color: white;
      font-family: "Rubik", sans-serif;
      transition: color 600ms;
    }
  </style>
</head>

<body>
  <ul class="list">
    <li><a href="#" class="link">
        Home</a></li>
    <li><a href="#" class="link  ">
        Blogs</a></li>
    <li><a href="#" class="link">
        Services</a></li>
    <li><a href="#" class="link ">
        Contact</a></li>
    <li><a href="#" class="link">
        About</a></li>
  </ul>
  <h1 class="name">
    Follow for more</h1>


  <!--Social Liks codings below-->
  <a id="source-link" class="meta-link" href="https://t.me/+7yc_oGHnLJhlOWVl" target="_blank">
    <i class="fas fa-link"></i>
    <span class="roboto-mono">Join my Telegram</span>
  </a>

  <a id="yt-link" class="meta-link" href="https://www.youtube.com/@codewith_muhilan?sub_confirmation=1" target="_blank">
    <i class="fab fa-youtube"></i>
    <span>Subscribe my channel..❤</span>
  </a>

</body>

</html>