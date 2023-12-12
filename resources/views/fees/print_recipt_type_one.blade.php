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
             <tr class="border_top">
                 <td colspan="2" class="border_top">GSTIN :   GST_NO_HERE</td>
                 <td colspan="2" class="text-end border_right "> PAN : PAN_NO_HERE</td>
             </tr>
             <tr>
                 <td colspan="4" class="text-center">
                     <h2>Hostel Name HERE</h2>
                     <h6>Hostel Address Here</h6>
                 </td>
             </tr>
             <tr>
                 <td>Receipt No. {{ $feesdata->recipet_no }}</td>
                 <td colspan="2" class="text-center  " style="font-size: 10px !important">New Boys Hostel / SPTG
                     Hostel</td>
                 <td class="text-end  ">Date : {{ date('d-m-Y', strtotime($feesdata->paid_date)) }}</td>
             </tr>

             <tr class="border_top">
                 <td colspan="2" class="border_top">Reverse Charges : No</td>
                 <td colspan="2" class="text-start border_right "> Place of Supply: GST STATE NAME</td>
             </tr>
             <tr class="border_top">
                 <td colspan="2" class="border_top">State Code: 24</td>
                 <td colspan="2" class="text-start border_right "> GSTIN :  </td>
             </tr>

             <tr>
                 <td>Received from Shri / Kumari</td>
                 <td colspan="3">{{ $student[0]->fname }} {{ $student[0]->mname }} {{ $student[0]->lname }}</td>
             </tr>
             <tr>
                 <td>Who is studying in </td>
                 <td colspan="3">{{ $student[0]->course }}</td>
             </tr>
             <tr>
                 <td>Towards</td>
                 <td colspan="2">Sem {{ $student[0]->year }} Fees</td>
                 <td>Hostel fees as detailed below</td>
             </tr>
             <tr>
                 <td class="text-center">Perticulers</td>
                 <td class="text-center">Amount</td>
                 <td colspan="2" rowspan="3">
                     The Sum of Rs. <span style="border-bottom: 2px dotted black; font-weight: 600">
                         {{ $amountInWords = ucwords((new NumberFormatter('en_IN', NumberFormatter::SPELLOUT))->format($feesdata->amount)) }}
                         Rupees only</span>
                     as detailed in the margin
                 </td>
             </tr>
             <tr>
                 <td>Mess Charges<br>(Amount inclusive of Taxes GST)</td>
                 <td class="text-center" style="vertical-align: middle">{{ number_format($feesdata->amount, 2) }}</td>
             </tr>
             <tr>
                 <td>
                     <span class="text-start">Total Amount</span>
                 </td>
                 <td class="text-center">
                     <span>{{ number_format($feesdata->amount, 2) }}</span>
                 </td>
             </tr>
         </tbody>
     </table>
 </body>

 </html>
