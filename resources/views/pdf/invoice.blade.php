<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
	<body style="font-family:sans-serif;max-width: 800px; width:100%;color:#434343;padding:0;margin:0;">
		<div style="width:100%; display: block;">
			<!-- <div style="width:100%; background-color: #5CB85C; height:22px; margin-top: 30px;"></div> -->
			<div style="clear: both;"></div>

			<div style="padding: 20px 40px">
				<h3>Invoice Pesanan #sayursmb-{{$data['id']}}</h3>
				<h4 style="color: #5CB85C;margin-bottom: 10px;">{{$data['name']}}</h4>
				<div style="width: 100%;">
					<div style="width: 50%; float: left;">
						<p style="text-align:left;">
							{{$data['mobile']}}
							<br>
							{{$data['address']}}, {{$data['city']}}, {{$data['state']}}
							<br>
							@if ($data['order_status'] == 'payment_success')
								LUNAS
							@else
								BELUM LUNAS | COD
							@endif	
						</p>
					</div>
					<div style="width: 50%; float: right; margin-top: -40px; text-align: right;">
						<img src="https://drive.google.com/thumbnail?id=1w1uXmC0H-T7benFKX3W44HRAYyuOh-Pt" style="width: 200px; height:100px; text-align: right;"/>
					</div>

				</div>
					<!-- table data -->
					<table style="border-spacing: 1;width: 100%; margin-top: 30px;">
						<tr style="background-color: #5CB85C; color: white;">
							<th style="color: #ffffff; text-align: left; padding: 10px">Nama Sayur</th>
							<th style="color: #ffffff; width: 20%; padding: 10px">Harga</th>
							<th style="color: #ffffff; width: 10%; padding: 10px">Qty</th>
							<th style="color: #ffffff; width: 20%; padding: 10px">Total</th>
						</tr>

						@foreach($data['detail'] as $detail)
						<tr style="background: #F7F7F7;">
							<td style="padding:10px;">{{$detail['product_name']}}</td>
							<td style="text-align: center; padding:10px;">Rp{{$detail['price']}}</td>
							<td style="text-align: center; padding:10px;">{{$detail['quantity']}} {{$detail['product']['jenis_satuan']}}</td>
							<td style="text-align: right; padding:10px;">Rp{{$detail['quantity'] * $detail['price']}}</td>
						</tr>
						@endforeach
					</table>
					<!-- summary -->
					<div style="width:100%; display:block; background-color: #dbffda; box-sizing: border-box; padding: 10px">
						<div style="width: 60%; float:left;">
							<h4>Sub Total:</h4>
							<h4>Diskon Kupon:</h4>
							<h4>Biaya Ongkir:</h4>
							<h4>Total Bayar: </h4>
						</div>
						<div style="width: 40%; float:right;">
							<h4 style="text-align: right;">Rp{{$data['grand_total'] - $data['shipping_charges'] + $data['coupon_amount']}}</h4>
							<h4 style="text-align: right;">Rp{{$data['coupon_amount']}}</h4>
							<h4 style="text-align: right;">Rp{{$data['shipping_charges']}}</h4>
							<h4 style="text-align: right;">Rp{{$data['grand_total']}}</h4>
						</div>
					</div>
					
				<!-- </div> -->
			</div>
			<!-- footer -->
			<!-- <div style="width:100%; float: left; background-color: #5CB85C; height:22px; margin-top: 50px;"></div> -->
		</div>
	</body>
</html>