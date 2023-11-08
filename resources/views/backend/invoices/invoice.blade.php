<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ translate('INVOICE') }}</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <style media="all">
        @page {
            margin: 0;
            padding: 0;
        }

        *,
        ::after,
        ::before {
            -webkit-box-sizing: border-box;
            box-sizing: border-box;
        }

        html {
            line-height: 1.15;
            -webkit-text-size-adjust: 100%;
        }

        body {
            margin: 0;
        }

        a {
            background-color: transparent;
        }

        b,
        strong {
            font-weight: bolder;
        }

        img {
            border-style: none;
        }

        button,
        input,
        optgroup,
        select,
        textarea {
            font-family: inherit;
            /* 1 */
            font-size: 100%;
            /* 1 */
            line-height: 1.15;
            /* 1 */
            margin: 0;
            /* 2 */
        }

        button,
        input {
            /* 1 */
            overflow: visible;
        }

        button,
        select {
            /* 1 */
            text-transform: none;
        }

        button,
        [type=button],
        [type=reset],
        [type=submit] {
            -webkit-appearance: button;
        }

        body,
        html {
            color: #666;
            font-family: "Inter", sans-serif;
            font-size: 14px;
            font-weight: 400;
            line-height: 1.6em;
            overflow-x: hidden;
            background-color: #f5f6fa;
        }

        p,
        div {
            margin-top: 0;
            line-height: 1.5em;
        }

        p {
            margin-bottom: 15px;
        }

        ul {
            margin: 0 0 25px 0;
            padding-left: 20px;
            list-style: disc;
        }

        img {
            border: 0;
            max-width: 100%;
            height: auto;
            vertical-align: middle;
        }

        a {
            color: inherit;
            text-decoration: none;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        button {
            color: inherit;
            -webkit-transition: all 0.3s ease;
            transition: all 0.3s ease;
        }

        table {
            width: 100%;
            caption-side: bottom;
            border-collapse: collapse;
        }

        th {
            text-align: left;
        }

        td {
            border-top: 1px solid #dbdfea;
        }

        td {
            padding: 10px 15px;
            line-height: 1.55em;
        }

        th {
            padding: 10px 15px;
            line-height: 1.55em;
        }

        b,
        strong {
            font-weight: bold;
        }

        ul {
            padding-left: 15px;
        }

        .gry-color *,
        .gry-color {
            color: #000;
        }

        table {
            width: 100%;
        }

        table th {
            font-weight: normal;
        }

        table.padding th {
            padding: .25rem .7rem;
        }

        table.padding td {
            padding: .25rem .7rem;
        }

        table.sm-padding td {
            padding: .1rem .7rem;
        }

        .border-bottom td,
        .border-bottom th {
            border-bottom: 1px solid #eceff4;
        }

        .text-left {
            text-align: left;
        }

        .text-right {
            text-align: right;
        }

        .tm_round_border {
            border: 1px solid #dbdfea;
            overflow: hidden;
            border-radius: 6px;
        }
    </style>
</head>


<body>
    <div>

        <div style="background: #eceff4;padding: 1rem;">
            <table>
                <tr>
                    <td>
                        <img alt="LOGO" src="https://its.tomsher.net/assets/img/logo_new.webp" width="100"
                            style="display:inline-block;">
                    </td>
                    <td style="font-size: 1.5rem;" class="text-right strong">INVOICE</td>
                </tr>
            </table>
            <table>
                <tr>
                    <td style="font-size: 1rem;" class="strong">Invoice To:</td>
                    <td class="text-right strong" style="font-size: 1rem;">Bill to:</td>
                </tr>
                <tr>
                    <td class="gry-color small">Lowell H. Dominguez</td>
                    <td class="gry-color text-right">Laralink Ltd</td>
                </tr>
                <tr>
                    <td class="gry-color small">84 Spilman Street, London</td>
                    <td class="gry-color text-right">86-90 Paul Street, London</td>
                </tr>
                <tr>
                    <td class="gry-color small">+971 123456789</td>
                    <td class="gry-color text-right">+971 1234567890</td>
                </tr>
            </table>
        </div>

        <div style="">
            <table style="border: 1px solid #dbdfea;overflow: hidden;border-radius: 6px;">
                <thead>
                    <tr class="gry-color" style="background: #eceff4; font-weight: bold;">
                        <th width="35%" class="text-left">Product Name</th>
                        <th width="15%" class="text-left">Delivery Type</th>
                        <th width="10%" class="text-left">Qty</th>
                        <th width="15%" class="text-left">Unit Price</th>
                        <th width="10%" class="text-left">Tax</th>
                        <th width="15%" class="text-right">Total</th>
                    </tr>
                </thead>
                <tbody class="strong">

                    <tr class="">
                        <td>Website Design</td>
                        <td>Plastic</td>
                        <td class="">10</td>
                        <td class="currency">AED 1000
                        </td>
                        <td class="currency">AED 200</td>
                        <td class="text-right currency">AED 1200</td>
                    </tr>


                    <tr class="">
                        <td>Website Design</td>
                        <td>Plastic</td>
                        <td class="">10</td>
                        <td class="currency">AED 1000
                        </td>
                        <td class="currency">AED 200</td>
                        <td class="text-right currency">AED 1200</td>
                    </tr>



                    <tr class="">
                        <td>Website Design</td>
                        <td>Plastic</td>
                        <td class="">10</td>
                        <td class="currency">AED 1000
                        </td>
                        <td class="currency">AED 200</td>
                        <td class="text-right currency">AED 1200</td>
                    </tr>



                    <tr class="">
                        <td>Website Design</td>
                        <td>Plastic</td>
                        <td class="">10</td>
                        <td class="currency">AED 1000
                        </td>
                        <td class="currency">AED 200</td>
                        <td class="text-right currency">AED 1200</td>
                    </tr>


                    <tr class="">
                        <td>Website Design</td>
                        <td>Plastic</td>
                        <td class="">10</td>
                        <td class="currency">AED 1000
                        </td>
                        <td class="currency">AED 200</td>
                        <td class="text-right currency">AED 1200</td>
                    </tr>

                </tbody>
            </table>
        </div>

        <div style="padding:0 1.5rem;">

            <table width="40%" class="text-right sm-padding small strong">
                <thead>
                    <tr>
                        <th width="60%"></th>
                        <th width="40%"></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>

                        <td>
                            <table class="text-right sm-padding small strong">
                                <tbody>
                                    <tr>
                                        <th class="gry-color text-left">Sub Total</th>
                                        <td class="currency">AED 30000</td>
                                    </tr>
                                    <tr>
                                        <th class="gry-color text-left">Shipping Cost</th>
                                        <td class="currency"> AED 2000</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="gry-color text-left">Total Tax</th>
                                        <td class="currency">AED 3000</td>
                                    </tr>
                                    <tr class="border-bottom">
                                        <th class="gry-color text-left">Coupon Discount</th>
                                        <td class="currency">AED 100</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left strong">Grand Total</th>
                                        <td class="currency">AED 99999999999999999</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>


    </div>
</body>

</html>
