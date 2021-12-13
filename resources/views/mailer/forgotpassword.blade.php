@extends('mailer.base_email')

@section('content')

<div role="article" aria-roledescription="email" lang="en" style="text-size-adjust:100%;-webkit-text-size-adjust:100%;-ms-text-size-adjust:100%;background-color:#939297;">
<table role="presentation" style="width:100%;border:none;border-spacing:0;">
  <tr>
    <td align="center" style="padding:0;">
      <table role="presentation" style="width:94%;max-width:600px;border:none;border-spacing:0;text-align:left;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
        <tr>
          <td style="padding:40px 30px 30px 30px;text-align:center;font-size:24px;font-weight:bold;">
            <a href="http://www.sayursembalun.com/" style="text-decoration:none;">
                <img src="https://drive.google.com/thumbnail?id=1w1uXmC0H-T7benFKX3W44HRAYyuOh-Pt" width="165" alt="SayurSembalun" style="width:80%;max-width:165px;height:auto;border:none;text-decoration:none;color:#ffffff;">
            </a>
          </td>
        </tr>
        <tr>
          <td style="padding:30px;background-color:#ffffff;">
            <h1 style="margin-top:0;margin-bottom:16px;font-size:26px;line-height:32px;font-weight:bold;letter-spacing:-0.02em;">
                Hi, {{$data['user']['name']}}
            </h1>
          </td>
        </tr>
        <tr>
          <td style="padding:0px 30px 11px 30px;font-size:0;background-color:#ffffff;border-bottom:1px solid #f0f0f5;border-color:rgba(201,201,207,.35);">
           
            <div class="col-lge" style="display:inline-block;width:100%;max-width:395px;vertical-align:top;padding-bottom:20px;font-family:Arial,sans-serif;font-size:16px;line-height:22px;color:#363636;">
              <p style="margin-top:0;margin-bottom:12px;">Anda baru-baru ini meminta untuk mengatur ulang kata sandi untuk akun ini</p>
              <p style="margin-top:0;margin-bottom:18px;">Untuk memperbarui kata sandi Anda, klik tombol di bawah ini:</p>
              <p style="margin:0;text-align:center;">
                <a href="{{$data['token']}}" style="background: #ff3884; text-decoration: none; padding: 10px 25px; color: #ffffff; border-radius: 4px; display:inline-block; mso-padding-alt:0;text-underline-color:#ff3884">
                  <span style="mso-text-raise:10pt;font-weight:bold;">Ubah Kata Sandi</span>
                </a>
              </p>
            </div>
          </td>
        </tr>
        <tr>
          <td style="padding:30px;background-color:#ffffff;">
            <p style="margin:0; text-align: center">Email ini dikirim secara otomatis, mohon tidak membalas email ini.</p>
          </td>
        </tr>
        <tr>
          <td style="padding:30px;text-align:center;font-size:12px;background-color:#404040;color:#cccccc;">
            <p style="margin:0 0 10px 0;"><a href="https://www.facebook.com/sayur.sembalun.90" style="text-decoration:none;"><img src="{{asset('img/web/facebook.png')}}" width="40" height="40" alt="f" style="display:inline-block;color:#cccccc;"></a> <a href="https://www.instagram.com/sayursembalun/" style="text-decoration:none;margin-left: 10px;"><img src="{{asset('img/web/instagram.png')}}" width="40" height="40" alt="i" style="display:inline-block;color:#cccccc;"></a></p>
            <p style="margin:0;font-size:14px;line-height:20px;">&reg; SayurSembalun, 2021</p>
          </td>
        </tr>
      </table>
    </td>
  </tr>
</table>
</div>

@endsection