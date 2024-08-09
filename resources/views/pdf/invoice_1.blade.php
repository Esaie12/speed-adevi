<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<meta http-equiv="X-UA-Compatible" content="ie=edge" />
		<title>Invoice</title>
		<link
			href="https://fonts.googleapis.com/css2?family=Inter:wght@400;700&display=swap"
			rel="stylesheet"
		/>
		<style>
			@media print {
				@page {
					size: A3;
				}
			}
			ul {
				padding: 0;
				margin: 0 0 1rem 0;
				list-style: none;
			}
			body {
				font-family: "Inter", sans-serif;
				margin: 0;
			}
			table {
				width: 100%;
				border-collapse: collapse;
			}
			table,
			table th,
			table td {
				border: 1px solid silver;
			}
			table th,
			table td {
				text-align: right;
				padding: 8px;
			}
			h1,
			h4,
			p {
				margin: 0;
			}

			.container {
				padding: 20px 0;
				width: 1000px;
				max-width: 90%;
				margin: 0 auto;
			}

			.inv-title {
				padding: 10px;
				border: 1px solid silver;
				text-align: center;
				margin-bottom: 30px;
			}

			.inv-logo {
				width: 150px;
				display: block;
				margin: 0 auto;
				margin-bottom: 40px;
			}

			/* header */
			.inv-header {
				display: flex;
				margin-bottom: 20px;
			}
			.inv-header > :nth-child(1) {
				flex: 2;
			}
			.inv-header > :nth-child(2) {
				flex: 1;
			}
			.inv-header h2 {
				font-size: 20px;
				margin: 0 0 0.3rem 0;
			}
			.inv-header ul li {
				font-size: 15px;
				padding: 3px 0;
			}

			/* body */
			.inv-body table th,
			.inv-body table td {
				text-align: left;
			}
			.inv-body {
				margin-bottom: 30px;
			}

			/* footer */
			.inv-footer {
				display: flex;
				flex-direction: row;
			}
			.inv-footer > :nth-child(1) {
				flex: 2;
			}
			.inv-footer > :nth-child(2) {
				flex: 1;
			}
		</style>
	</head>
	<body>
		<div class="container">
			<div class="inv-title">
				<h1>Facture #{{$invoice->reference}}</h1>
			</div>
			<img src="./ZAF.jpg" class="inv-logo" />
			<div class="inv-header">
				<div>
					<h2>{{$invoice->user->firstname}} {{$invoice->user->lastname}}</h2>
					<ul>
						<li>{{$invoice->user->account_id}}</li>
						<li>{{$invoice->user->phone}} | {{$invoice->user->email}}</li>
                        <li>{{ Carbon\Carbon::parse($invoice->date_invoice)->translatedFormat('d M, Y H:i')}}</li>
					</ul>
				</div>
				<div>
					<table>
						<tr>
							<th>Facture crée le</th>
							<td>{{ Carbon\Carbon::parse($invoice->date_invoice)->translatedFormat('d M, Y H:i')}}</td>
						</tr>
						<tr>
							<th>Status</th>
							<td>Payer</td>
						</tr>
						<tr>
							<th>Moyen de paiement</th>
							<td>{{$invoice->agregateur}}</td>
						</tr>
                        <tr>
							<th>Montant Payer</th>
							<td>{{ format_money($invoice->amount) }}</td>
						</tr>
                        <tr>
							<th>Date de paiement</th>
							<td>{{ Carbon\Carbon::parse($invoice->date_invoice)->translatedFormat('d M, Y H:i')}}</td>
						</tr>
					</table>
				</div>
			</div>
			<div class="inv-body">
				<table>
					<thead>
						<th>Product</th>
						<th>Quantity</th>
						<th>Price</th>
					</thead>
					<tbody>
                        @foreach ($items as $key=> $item)
						<tr>
							<td>
								<h4>{{$item->item}}</h4>
								<p>{{$item->description}}</p>
							</td>
							<td>{{$item->quantity}}</td>
							<td>{{ format_money($item->amount) }}</td>
						</tr>
                        @endforeach
					</tbody>
				</table>
			</div>
			<div class="inv-footer">
				<div><!-- required --></div>
				<div>
					<table>
						<tr>
							<th>Sous Total</th>
							<td>{{ format_money($invoice->amount) }}</td>
						</tr>
						<tr>
							<th>Taxe (0%)</th>
							<td>{{ format_money(0) }}</td>
						</tr>
						<tr>
							<th>Montant Total</th>
							<td>{{ format_money($invoice->amount) }}</td>
						</tr>
					</table>
				</div>
			</div>
		</div>
	</body>
</html>
