
    <style>
	/* -------------------------------------
		GLOBAL
		A very basic CSS reset
	------------------------------------- */
	* {
		margin: 0;
		padding: 0;
		font-family: "Helvetica Neue", "Helvetica", Helvetica, Arial, sans-serif;
		box-sizing: border-box;
		font-size: 14px;
	}

	img {
		max-width: 100%;
	}

	body {
		-webkit-font-smoothing: antialiased;
		-webkit-text-size-adjust: none;
		width: 100% !important;
		height: 100%;
		line-height: 1.6;
	}

	/* Let's make sure all tables have defaults */
	table td {
		vertical-align: top;
	}

	/* -------------------------------------
		BODY & CONTAINER
	------------------------------------- */
	body {
		background-color: #f6f6f6;
	}

	.body-wrap {
		background-color: #f6f6f6;
		width: 100%;
	}

	.container {
		display: block !important;
		max-width: 600px !important;
		margin: 0 auto !important;
		/* makes it centered */
		clear: both !important;
	}

	.content {
		max-width: 600px;
		margin: 0 auto;
		display: block;
		padding: 20px;
	}

	/* -------------------------------------
		HEADER, FOOTER, MAIN
	------------------------------------- */
	.main {
		background: #fff;
		border: 1px solid #e9e9e9;
		border-radius: 3px;
	}

	.content-wrap {
		padding: 20px;
	}

	.content-block {
		padding: 0 0 20px;
	}

	.header {
		width: 100%;
		margin-bottom: 20px;
	}

	.footer {
		width: 100%;
		clear: both;
		color: #999;
		padding: 20px;
	}
	.footer a {
		color: #999;
	}
	.footer p, .footer a, .footer unsubscribe, .footer td {
		font-size: 12px;
	}

	/* -------------------------------------
		TYPOGRAPHY
	------------------------------------- */
	h1, h2, h3 {
		font-family: "Helvetica Neue", Helvetica, Arial, "Lucida Grande", sans-serif;
		color: #000;
		margin: 40px 0 0;
		line-height: 1.2;
		font-weight: 400;
	}

	h1 {
		font-size: 32px;
		font-weight: 500;
	}

	h2 {
		font-size: 24px;
	}

	h3 {
		font-size: 18px;
	}

	h4 {
		font-size: 14px;
		font-weight: 600;
	}

	p, ul, ol {
		margin-bottom: 10px;
		font-weight: normal;
	}
	p li, ul li, ol li {
		margin-left: 5px;
		list-style-position: inside;
	}

	/* -------------------------------------
		LINKS & BUTTONS
	------------------------------------- */
	a {
		color: #0000e6;
		text-decoration: underline;
	}

	.btn-primary {
		text-decoration: none;
		color: #FFF;
		background-color: #2c3850;
		border: solid #2c3850;
		border-width: 5px 10px;
		line-height: 2;
		font-weight: bold;
		text-align: center;
		cursor: pointer;
		display: inline-block;
		border-radius: 5px;
		text-transform: capitalize;
	}

	/* -------------------------------------
		OTHER STYLES THAT MIGHT BE USEFUL
	------------------------------------- */
	.last {
		margin-bottom: 0;
	}

	.first {
		margin-top: 0;
	}

	.aligncenter {
		text-align: center;
	}

	.alignright {
		text-align: right;
	}

	.alignleft {
		text-align: left;
	}

	.clear {
		clear: both;
	}

	/* -------------------------------------
		ALERTS
		Change the class depending on warning email, good email or bad email
	------------------------------------- */
	.alert {
		font-size: 16px;
		color: #fff;
		font-weight: 500;
		padding: 20px;
		text-align: center;
		border-radius: 3px 3px 0 0;
	}
	.alert a {
		color: #fff;
		text-decoration: none;
		font-weight: 500;
		font-size: 16px;
	}
	.alert.alert-warning {
		background: #f8ac59;
	}
	.alert.alert-bad {
		background: #ed5565;
	}
	.alert.alert-good {
		background: #1ab394;
	}

	/* -------------------------------------
		INVOICE
		Styles for the billing table
	------------------------------------- */
	.invoice {
		margin: 40px auto;
		text-align: left;
		width: 80%;
	}
	.invoice td {
		padding: 5px 0;
	}
	.invoice .invoice-items {
		width: 100%;
	}
	.invoice .invoice-items td {
		border-top: #eee 1px solid;
	}
	.invoice .invoice-items .total td {
		border-top: 2px solid #333;
		border-bottom: 2px solid #333;
		font-weight: 700;
	}

	/* -------------------------------------
		RESPONSIVE AND MOBILE FRIENDLY STYLES
	------------------------------------- */
	@media only screen and (max-width: 640px) {
		h1, h2, h3, h4 {
			font-weight: 600 !important;
			margin: 20px 0 5px !important;
		}

		h1 {
			font-size: 22px !important;
		}

		h2 {
			font-size: 18px !important;
		}

		h3 {
			font-size: 16px !important;
		}

		.container {
			width: 100% !important;
		}

		.content, .content-wrap {
			padding: 10px !important;
		}

		.invoice {
			width: 100% !important;
		}
	}

	</style>

<body>

<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="content-wrap">
                            <table  cellpadding="0" cellspacing="0">
                                <tr>
                                    <td>
                                        <img class="img-responsive" src="<?= PORTAL ?>/assets/images/password-recovery.jpg"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <h3>Hi, {RCPT_EMAIL}.</h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        You have received this email because you request for password recovery. 
                                    </td>
                                </tr>
                                <tr>
                                	<td class="content-block aligncenter">
                                		<a href="{RESET_URL}" class="btn-primary">
                                			Reset Your Password
                                		</a>
                                	</td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        If you didn’t make this request, please ignore this email. Your password will not change and no further action is required on your part.
                                    </td>
                                </tr>
								
								<tr>
                                    <td class="content-block">
										Thanks,<br />
										Intelligent Ecommerce</br>
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="content-block">
                                        If you’re having trouble clicking the button, please click the URL below:
                                    </td>
                                </tr>
                                
                                <tr>
                                    <td class="content-block aligncenter">
                                        <a href="{RESET_URL}">{RESET_URL}</a>
                                    </td>
                                </tr>
                                 <tr>
			                    	<td>
			                    		<div class="w3-container w3-teal" >
			                    			<div class="row">
			                    				<div class="col-sm-12" style="background-color:#21262c;">
			                    					<h3 style="color:white; font-family:Verdana, Geneva, sans-serif; padding:10px;">Follow Us</h3>
														<p style="color:white; font-size: 12px; padding:10px;">+6012-283 6731 | +607-521 1178<br />
														https://www.intelhost.com.my<br />
														Copyright@Intelligent Ecommerce@2018</p>
			                    				</div>
			                    			</div>
										</div>
			                    	</td>
			                    </tr>
                              </table>
                        </td>
                    </tr>
                </table>
        </td>
        <td></td>
    </tr>
</table>

</body>

