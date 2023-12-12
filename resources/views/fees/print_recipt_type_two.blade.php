 <!DOCTYPE html>
 <html lang="en">

 <head>
     <meta charset="UTF-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Print</title>
     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
         integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">.
     <style>
         @media print {
             p {
                 font-size: 12px;
             }

             body {
                 font-size: 11px;
             }

             .container {
                 width: 100%;
                 max-width: 100%;
             }
         }




         .table>:not(caption)>*>* {
             padding-top: 5px !important;
             padding-bottom: 5px !important;
             padding-right: 5px !important;
             background-color: var(--bs-table-bg);
             border-bottom-width: 1px;
             box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
         }





         .table-bordered>:not(caption)>* {
             border-width: 0px 0;
         }

         .text-right {
             text-align: right !important;
         }

         .table>:not(caption)>*>* {
             padding: 10px;
             background-color: var(--bs-table-bg);
             border-bottom-width: 1px;
             box-shadow: inset 0 0 0 9999px var(--bs-table-accent-bg);
         }

         .table {
             border-color: black;
         }





         .table-bordered>:not(caption)>*>* {
             border-width: 1px var(--bs-border-width);
         }

         .border_left {
             border-left: 1px solid;
         }

         .border_right {
             border-right: 1px solid;
         }

         .border_bottom {
             border-bottom: 1px solid;
         }

         .border_top {
             border-top: 1px solid;
         }
     </style>
 </head>

 <body class="container">
     <table class="table table-bordered border_right " style="border-right: 1px solid black">
         <tbody>
             <tr>
                 <td colspan="3" class="text-center">
                     <h2 style="text-transform: uppercase">HOSTEL_NAME_HERE <span
                             style="font-size: 15px">ADDRESS_HERE</span></h2>
                     <h6>
                         Nwe Boys Hostel / GCB HOSTEL/ SPTG Hostel
                     </h6>
                     <strong>FEES RECEIPT</strong>
                 </td>
             </tr>
             <tr>
                 <td><strong>Receipt No. {{ $feesdata->recipet_no }}</strong></td>
                 <td colspan="2"><strong>Date:. {{ date('d-m-Y', strtotime($feesdata->paid_date)) }}</strong></td>
             </tr>
             <tr>
                 <td colspan="3">
                     <strong>Received from Shri / Kumari : </strong> {{ $student[0]->fname }} {{ $student[0]->mname }}
                     {{ $student[0]->lname }}
                 </td>
             </tr>
             <tr>
                 <td colspan="3">
                     <strong>Who is studying in : </strong>{{ $student[0]->cource }}
                 </td>
             </tr>
             <tr>
                 <td colspan="3" style="padding-top: 20px !important">
                     <strong>towards....................................................................................................................
                         Hostel Fees as
                         detailed below:</strong>
                 </td>

             </tr>
             <tr>
                 <td class="text-center"><strong>Particulars</strong></td>
                 <td class="text-center"><strong>Amount</strong></td>
                 <td rowspan="3"> The Sum of Rs. <span style="border-bottom: 2px dotted black; font-weight: 600">
                         {{ $amountInWords = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($feesdata->amount)) }}
                         Rupees only</span>
                     as detailed in the margin</td>
             </tr>
             <tr>
                 <td>1. Hostel Charges <strong> ({{ $student[0]->fees_duration }} Months)</strong></td>
                 <td><strong> Rs. </strong> {{ number_format($feesdata->amount, 2) }}</td>
             </tr>

             <tr>
                 <td class="text-end"><strong>Total Amount : </strong></td>
                 <td><strong> Rs. </strong> {{ number_format($feesdata->amount, 2) }}</td>

             </tr>

         </tbody>
     </table>
 </body>

 </html>
