<?php
namespace Home\Controller;
use Think\Controller;
use Org\General\Order;
class TcpdfController extends Controller {
	
	public function __construct() {
		parent::__construct ();		
	}
	//html转pdf
    public function htmltopdf($html){ 
		$data =  mb_detect_encoding($html);
	    $html =  mb_convert_encoding($html,'utf-8',$data);
		$this->pdfmodel = D('Tcpdf');
		$this->pdfmodel->htmltopdf($html);
	}
	
	
	//string转pdf
	public function stringtopdf($string){
		$data =  mb_detect_encoding($string);
	    $html =  mb_convert_encoding($string,'utf-8',$data);
		$this->pdfmodel = D('Tcpdf');
		$this->pdfmodel->stringtopdf($string);
	}
	
	
	public function test(){
		$params = I('get.');
		$contractInfo = Order::get_contract_info($params);
		$orderInfo = Order::get_order_info($params);
        $goods_list = '';
		
		foreach($orderInfo['goods'] as $goods){
			$goods_html = "
			<tr valign=\"top\">
            	<td width=\"80\" style=\"border: 1px solid #00000a;\">".$goods['goods'][0]."</td>
            	<td width=\"80\" style=\"border: 1px solid #00000a;\">".$goods['goods'][1]."</td>
            	<td width=\"80\" style=\"border: 1px solid #00000a;\">".$goods['goods'][2]."</td>
            	<td width=\"80\" style=\"border: 1px solid #00000a;\">".$goods['goods_price']."</td>
            	<td width=\"80\" style=\"border: 1px solid #00000a;\">".$goods['goods_num']."</td>
            	<td width=\"80\" style=\"border: 1px solid #00000a;\">".$goods['total_price']."</td>
            	<td width=\"100\" style=\"border: 1px solid #00000a;\">含税</td>
        	</tr>";
        	$goods_list .= $goods_html;
		}

		$html = "
        <!DOCTYPE html>
		<html>
		<head>
		<meta charset=\"utf-8\">
		<title></title>
		</head>
		<body>
			<p style=\"font-size: 24px; text-align: center;\">
    			<strong>产品购销协议</strong>
			</p>
			<p style=\"text-align: right;\">
    			合同编号：（2018）购销 &nbsp; 00".$contractInfo['id']." &nbsp; 号
			</p>
			<p></p>
			<p style=\"font-size: 13px;\">
    			供方（以下简称甲方）： &nbsp; ".$contractInfo['a_company']."
			</p>
			<p style=\"font-size: 13px;\">
    			地址： &nbsp; ".$contractInfo['a_address']."
			</p>
			<p style=\"font-size: 13px;\">
    			法定代表人： &nbsp; ".$contractInfo['a_legal_representative']." &nbsp; 
    			联系电话： &nbsp; ".$contractInfo['a_contact_number']." &nbsp; 
    			电子邮箱： &nbsp; ".$contractInfo['a_email']."
			</p>
			<p style=\"font-size: 13px;\">
    			需方（以下简称乙方）： &nbsp; ".$contractInfo['b_company']."
			</p>
			<p style=\"font-size: 13px;\">
    			地址： &nbsp; ".$contractInfo['b_address']."
			</p>
			<p style=\"font-size: 13px;\">
    			法定代表人： &nbsp; ".$contractInfo['b_legal_representative']." &nbsp; 
    			联系电话： &nbsp; ".$contractInfo['b_contact_number']." &nbsp; 
    			电子邮箱： &nbsp; ".$contractInfo['b_email']."
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			根据《中华人民共和国合同法》、《民法总则》等相关法律法规，甲乙双方经过友好协商，签订本协议。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			<strong>第一条 &nbsp;货物规格型号、数量、单价、金额</strong>
			</p>
			<table width=\"580\">
    			<colgroup>
        			<col width=\"80\"/>
        			<col width=\"80\"/>
        			<col width=\"80\"/>
        			<col width=\"80\"/>
        			<col width=\"80\"/>
        			<col width=\"80\"/>
        			<col width=\"100\"/>
    			</colgroup>
    			<tbody>
        			<tr valign=\"top\" class=\"firstRow\">
            			<td width=\"80\" style=\"border: 1px solid #00000a;\">
                			<p style=\"font-size: 10px;\">
                    			<strong>产品名称</strong>
                			</p>
            			</td>
            			<td width=\"80\" style=\"border: 1px solid #00000a;\">
                			<p style=\"font-size: 10px;\">
                    			<strong>产地</strong>
                			</p>
            			</td>
            			<td width=\"80\" style=\"border: 1px solid #00000a;\">
                			<p style=\"font-size:10px;\">
                    			<strong>型号规格</strong>
                			</p>
            			</td>
            			<td width=\"80\" style=\"border: 1px solid #00000a;\">
                			<p style=\"font-size: 10px;\">
                    			<strong>单价（元）</strong>
                			</p>
            			</td>
            			<td width=\"80\" style=\"border: 1px solid #00000a;\">
                			<p style=\"font-size: 10px;\">
                    			<strong>数量（吨）</strong>
                			</p>
            			</td>
            			<td width=\"80\" style=\"border: 1px solid #00000a;\">
                			<p style=\"font-size: 10px;\">
                    			<strong>货款金额</strong>
                			</p>
            			</td>
            			<td width=\"100\" style=\"border: 1px solid #00000a;\">
                			<p style=\"font-size: 10px;\">
                    			<strong>备注（是否含税）</strong>
                			</p>
            			</td>
        			</tr>
        			".$goods_list."
        			<tr valign=\"top\">
            			<td width=\"80\" style=\"border: 1px solid #00000a;\">
                			<p style=\"font-size: 10px;\">
                    			<strong>货款总价</strong>
                			</p>
            			</td>
            			<td colspan=\"3\" width=\"500\" style=\"border: 1px solid #00000a;\">".$orderInfo['total_price']."</td>
        			</tr>
    			</tbody>
			</table>
			<p style=\"font-size: 13px; text-indent: 24px;\">
    			在交易过程中，如上述货物规格、型号、 数量、单价等发生变更或与本协议约定不一致，应协商一致并签署补充协议，否则，以本协议约定的为准。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			<strong>第二条 &nbsp; 产品质量</strong>
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			甲方应保证商品质量符合国家标准、行业标准；无国家标准、行业标准的，应不低于一般的通用标准；本协议明确约定了质量标准的，不得低于约定的质量标准。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
				乙方应对其提供的商品的质量负完全责任。由于商品质量不合格而给消费者、用户或其他人造成人身损害或财产损失，供货商应承担由此而使乙方支出的一切费用或承担的损失。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			<strong>第三条 &nbsp;交货及验收</strong>
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			（一）甲乙双方约定的交货时间为：".date('Y-m-d', $contractInfo['delivery_time'])."
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			如甲方不能按照上述约定交货，需要按照应交货货款总额的30%承担违约金，如因甲方不能按约定交货，造成乙方经济损失，甲方除承担违约金外，还需要赔偿乙方全部经损失。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			（二）甲乙双方约定的交货方式为以下第（".$contractInfo['delivery']."）方式：
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			1、自提货物，双方约定自提货物的地点为：".$contractInfo['delivery_address']."
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			2、甲方送货至乙方指定的地点： &nbsp; ".$contractInfo['delivery_address_1']." &nbsp; ，自货物送至指定地点前或虽送货至乙方指定地点但乙方与甲方尚未验收完毕前的货物损毁、灭失的风险由甲方承担，货物经甲乙双方验收后，货物损毁、灭失的风险由乙方承担，但甲方按约定送货至乙方指定地点，乙方以各种借口或以各种形式拒绝验收或拖延验收的，甲方可以将货物提存或自行保管，由此产生的一切费用及风险由乙方承担，甲方可以追究乙方的违约责任或要求乙方赔偿一切经济损失。 
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			3、乙方应在收到甲方的货物时与甲方共同对货物的包装、规格、型号、数量等进行验收，如发现有与协议约定不一致，或发现货物表面质量问题，应在验收之日或在验收之日起次日以书面形式向甲方提出，也可以拒绝收取相应货物并拒绝支付相应货款，由此产生一切法律责任由甲方承担。货物的隐蔽质量瑕疵在验收时未能发现，乙方在质量保证期间内发现该货物有质量瑕疵的，乙方有权要求甲方退回相应货款或者更换相应货物，同时还可以追究甲方违约责任。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			如双方验收无异议，甲乙双方工作人员应在货物验收单签名，甲乙双方指定验货工作人员应向对方提交本公司的书面授权委托书及身份证复印件。无书面授权委托书的，视为该工作人员没有取得授权，不得参与验货事项。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			<strong>第四条 &nbsp; 保证金及货款支付</strong>
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			（一）甲乙双方可以选择以下（ ".$contractInfo['payment']." ）种方式结算货款
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			1、先交货款后交货，乙方在签署本协议时即应向甲方预付全部货款，甲方时候到货款后按本协议约定验收货物，验收完毕后与甲方结算，多退少补，一次结清。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			2、先付保证金，货到付款，甲乙双方约定，在签订本协议后向甲方支付 &nbsp; ".$contractInfo['security_deposit']." &nbsp; 元作为购买甲方货物以及履行本协议的保证金，如乙方在签署本协议后不履行本协议约定的义务，包括但不限于支付货款义务，甲方可以没收该保证金作为违约金，还可以要求乙方继续履行协议；如甲方在收取保证金后不予履行本协议，乙方可以要求甲方按照保证金金额的2倍向乙方承担违约或赔偿责任，还可以要求甲方继续履行协议。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			甲乙双方按本协议约定履行的，乙方收取甲方货物时，本保证金自动转化为货款或充抵相应货款，甲方不退回该保证金。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			其余货款在乙方收取货物时支付或在收取货物后 &nbsp; ".$contractInfo['last_days']." &nbsp; 个工作日内支付。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			3、先交货，验收完毕后付款 乙方在收取相应货物并验收完毕后即一次性向甲方支付相应货款。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			（二）甲方指定收取保证金或货款的银行账户为：
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			开户行：".$contractInfo['account_bank']."
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			户名：".$contractInfo['account_name']."
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			银行账户：".$contractInfo['account_number']."
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			乙方应按照甲方指定的上述银行账户转账，不得向其他未指定的银行账户支付货款，否则，视为未支付货款。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			<strong>第五条 &nbsp;协议的解除</strong>
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			本协议未经双方协会一致，任何一方不得单方面解除本协议。出现以下情况，守约的一方可以单方面解除协议，并可以追究对方法律责任。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			1、双方中的一方破产、清算；
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			2、双方中的一方不能支付或停止支付或一方不能按约定提供货物或提供货物与协议约定不一致，一方不能按要求更换或补充，从而达不到协议目的。解除协议的一方应书面通知另一方，否则，协议解除不发生法律效力。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			<strong>第六条 &nbsp; 协议权力义务的转让禁止</strong>
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			双方任何一方未经另一方书面同意均不得将本协议书全部或部分权利，、义务转让给第三方。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			<strong>第七条 &nbsp; 违约责任</strong>
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			甲乙双方均应严格按本协议约定履行，如一方违约，视情况向守约一方承担货款总额10%-30%的违约金，如违约金不能补偿损失的，除承担违约金外，还需要赔偿全部直接经济损失。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			<strong>第八条 &nbsp;通知和送达</strong>
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			甲、乙双方因履行本协议而相互发出或者提供的所有通知、文件、材料，均以本协议所列明的地址、电话、传真、电子邮箱通知和送达。一方迁址或者变更电话、传真、电子邮箱的，应当书面通知对方。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			以当面交付文件方式送达的，交付之时视为送达；以电子邮件方式送达的，发出电子邮件时视为送达；以传真方式送达的，发出传真时视为送达；以邮寄方式送达的，邮件交邮当日视为送达。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			<strong>第九条 &nbsp;协议期限</strong>
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			1、本协议有效期自 &nbsp; ".date('Y', $contractInfo['start_time'])." &nbsp; 年 &nbsp; ".date('m', $contractInfo['start_time'])." &nbsp; 月 &nbsp; ".date('d', $contractInfo['start_time'])." &nbsp; 日起至 &nbsp; ".date('Y', $contractInfo['end_time'])." &nbsp; 年 &nbsp; ".date('m', $contractInfo['end_time'])." &nbsp; 月 &nbsp; ".date('d', $contractInfo['end_time'])." &nbsp; 日止，共 &nbsp; ".$contractInfo['contract_month']." &nbsp; 个月。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			2、协议期满前1个月，如双方同意继续合作，应重新签订新的协议；如未签订新的协议，乙方仍然下达订单且甲方接受的，视为本协议继续有效，协议有效期按原协议约定有效期限自动延长。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			<strong>第十条 &nbsp;争议解决</strong>
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			由于本协议书中未规定的事宜或由于双方对本协议书个别条款的解释发生争议时，双方应以诚相待，协商解决，如双方经协商不能达成一致，任何一方有权向合同签订地或原告所在地、被告所在地人民法院提起诉讼。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			<strong>第十一条 &nbsp;生效</strong>
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			本协议书自双方签字盖章之日起生效，甲乙双方采取电子印章签署本协议的，应保证签约主体双方真实以及签章形式和内容符合电子法律相关规定，一方采取虚假电子印章签署本协议的，视为有合同诈骗故意，需依法承担刑事责任。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			本协议书一式两份，双方各执一份；
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			本协议书未尽事宜，经双方协商达成一致后，可另行签订补充协议。本协议书的附件及补充协议，均作为本协议书的有效组成部分，具有同等法律效力。
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			（下无正文）
			</p>
			<p style=\"text-indent: 24px; font-size:13px;\">
    			甲方（盖章）：__________ &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    			乙方（盖章）：__________
			</p>
			<p style=\"text-indent: 24px; font-size:13px;\">
    			签约代表：".$contractInfo['a_deputation']." &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    			签约代表：".$contractInfo['b_deputation']." &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			".date('Y', $contractInfo['a_contract_time'])." &nbsp; 年 &nbsp; ".date('m', $contractInfo['a_contract_time'])." &nbsp; 月 &nbsp; ".date('d', $contractInfo['a_contract_time'])." &nbsp; 日 &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;
    			".date('Y', $contractInfo['b_contract_time'])." &nbsp; 年 &nbsp; ".date('m', $contractInfo['b_contract_time'])." &nbsp; 月 &nbsp; ".date('d', $contractInfo['b_contract_time'])." &nbsp; 日
			</p>
			<p style=\"text-indent: 24px; font-size: 13px;\">
    			合同签订地：
    			东莞市樟木头镇
			</p>
		</body>
		</html>
		";

		$this->htmltopdf($html);
	}
	
}