<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Facture {{$facture->id}}</title>
    <style>
        .clearfix:after {
            content: "";
            display: table;
            clear: both;
        }

        body {
            position: relative;
            width: 18cm;
            margin: 0 auto;
            color: #000;
            font-family: Arial, sans-serif;
            font-size: 12px;
        }

        header {
            padding: 10px 0;
            margin-bottom: 30px;
        }

        h1 {
            border-bottom: 2px solid #007acc;
            color: #007acc;
            font-size: 2em;
            text-align: center;
            margin: 0;
            padding-bottom: 10px;
        }

        #company {
            text-align: right;
            float: right;
        }

        #project {
            float: left;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        table tr:nth-child(2n-1) td {
            background: #f2f2f2;
        }

        table th, table td {
            padding: 10px;
            text-align: left;
        }

        table th {
            background: #007acc;
            color: #fff;
            font-weight: bold;
        }

        table td {
            border-bottom: 1px solid #007acc;
        }

        table .service, table .desc {
            text-align: left;
        }

        table td.unit, table td.qty, table td.total {
            font-size: 1.2em;
        }

        table td.grand {
            border-top: 2px solid #007acc;
        }

        #notices .notice {
            color: #007acc;
            font-size: 1.2em;
            margin-top: 10px;
        }

        footer {
            color: #007acc;
            width: 100%;
            text-align: center;
            border-top: 1px solid #007acc;
            padding: 10px 0;
            position: absolute;
            bottom: 0;
        }
    </style>
</head>
<body>
<header class="clearfix">
    <h1>Facture - {{$facture->id}}</h1>
    <div id="company" class="clearfix" style="margin-top: 30px;">
        <div><span>NOM AGENT :</span> {{ $user->name }}  </div>
        <div><span>PRENOM AGENT :</span>  {{ $user->first_name}}</div>
        <div><span>ADRESSE :</span> {{ $user->adress }}</div>
        <div><span>EMAIL :</span> {{ $user->email }}</div>
        <div><span>TEL :</span> {{ $user->phone }}</div>
    </div>
    <div id="project" style="margin-top: 30px;">
        <div>FRE2E COMPANY</div>
        <div>EMAIL : XXXXXXXXX</div>
        <div>ADRESSE : XXXXXXXXX</div>
        <div>TELEPHONE : XXXXXXXXX</div>
        <div>WHATSAPP : XXXXXXXXX</div>
        
        
    </div>
</header>
<main>
    <table>
        <thead>
        <tr>
            <th class="service">DESCRIPTION</th>
            <th class="desc">QUANTITE</th>
            <th class="total">PRIX UNITAIRE</th>
            <th class="total">TVA</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($item_factures as $item)
            <tr>
                <td class="service">{{ $item->article}}</td>
                <td class="desc">{{ $item->quantite}}</td>
                <td class="total">{{ $item->price}} €</td>
                <td class="total">{{ $item->numberTVA}} %</td>
            </tr>
        @endforeach
        <tr>
            <td colspan="3" class="grand total">Total HT</td>
            <td class="grand total">{{$facture->totalHT}} €</td>
        </tr>
        <tr>
            <td colspan="3" class="grand total">Total TVA</td>
            <td class="grand total">{{ ($facture->totalTVA*$facture->totalHT)/100 }}</td>
        </tr>
        <tr>
            <td colspan="3" class="grand total">Total TTC</td>
            <td class="grand total">{{ $facture->totalHT + ($facture->totalTVA*$facture->totalHT)/100 }}€</td>
        </tr>
        </tbody>
    </table>
    <div style="display: flex; justify-content: space-between; flex-wrap: wrap;">
        <span>
            <div id="notices">
                <span>Date d'émission:</span>
                <span class="notice">{{$facture->date_emission}}</span>
            </div>
            <div id="notices">
                <span>Date d'échéance:</span>
                <span class="notice">{{$facture->date_echeance}}</span>
            </div>
        </span>
    
        
    </div>
    
</main>
<footer>
    <span>
        <div id="notices">
            <span>Détails du paiement</span>
            
        </div>
        <div id="notices">
            <span>Nom du bénéficiaire:</span>
            <span class="notice">xxxxxx</span>
        </div>
        <div id="notices">
            <span>IBAN:</span>
            <span class="notice">xxxxxx</span>
        </div>
        <div id="notices">
            <span>BIC:</span>
            <span class="notice">xxxxxx</span>
        </div>
        <div id="notices">
            <span>Référence:</span>
            <span class="notice">xxxxxx</span>
        </div>
    </span>
</footer>
</body>
</html>
