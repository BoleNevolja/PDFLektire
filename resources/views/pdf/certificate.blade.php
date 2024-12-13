<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="hr" lang="hr"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title>IZVJEŠTAJ</title><meta name="author" content="Bosko"><meta name="keywords" content="DAGZMjRKUG0,BAE1zNziBxY"><style type="text/css"> * {margin:0; padding:0; text-indent:0; }
    body { background-color: #B18BFF; }
    .s1 { color: #29262A; font-family:"Palatino Linotype", serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 38pt; }
    h3 { color: #29262A; font-family:Calibri, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 9.5pt; }
    h1 { color: #29262A; font-family:Calibri, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 21pt; }
    .s2 { color: #FFF; font-family:Calibri, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 9.5pt; }
    p { color: #FFF; font-family:"Century Gothic", sans-serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 10pt; margin:0pt; }
    h2 { color: #FFF; font-family:Verdana, sans-serif; font-style: normal; font-weight: bold; text-decoration: none; font-size: 10pt; }
    .s3 { color: black; font-family:"Times New Roman", serif; font-style: normal; font-weight: normal; text-decoration: none; font-size: 10pt; }
   </style></head>
   <body>
    <p style="text-indent: 0pt;text-align: left;">
        <br>
    </p>
    <p style="text-indent: 0pt;text-align: left;"><span></span></p><table cellspacing="0" cellpadding="0"><tbody><tr><td>
        <p class="s1" style="padding-left: 5pt;text-indent: 0pt;line-height: 73%;text-align: left;">{{$user->name}}</p>
        <h3 style="padding-top: 2pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">{{$user->email}}</h3>
        <p style="text-indent: 0pt;text-align: left;"><br></p>
        <p style="padding-left: 5pt;text-indent: 0pt;line-height: 1pt;text-align: left;"></p>
        <p style="padding-top: 11pt;text-indent: 0pt;text-align: left;"><br></p>
        <h3 style="padding-left: 5pt;text-indent: 0pt;text-align: left;">BROJ PREUZIMANJA:</h3>
        <h1 style="padding-left: 5pt;text-indent: 0pt;text-align: left;">{{$user->downloads->count()}}</h1>
        <h3 style="padding-top: 16pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">BROJ KOMENTARA:</h3>
        <h1 style="padding-left: 5pt;text-indent: 0pt;text-align: left;">{{$user->comments->count()}}</h1>
        <h3 style="padding-top: 16pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">BROJ LAJKOVANIH KNJIGA:</h3>
        <h1 style="padding-left: 5pt;text-indent: 0pt;text-align: left;">{{$user->favorites()->count()}}</h1>
        <h3 style="padding-top: 16pt;padding-left: 5pt;text-indent: 0pt;text-align: left;">BROJ OBJAVLJENIH KNJIGA:</h3>
        <h1 style="padding-left: 5pt;text-indent: 0pt;text-align: left;">{{$user->books->count()}}</h1>

        <h5>PDFKnjige.com</h5>
   </body>
   </html>