<?php
namespace Home\Model;
use Think\Model;
class TcpdfModel extends Model {
	
	protected $tableName = 'shop_user';
  
	public function __construct() {
		parent::__construct ();
	}
	
    //html写pdf
	public function htmltopdf($html){		
		Vendor('TCPDF.tcpdf','','.php');
		$pdf = new \TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

		   
		// 设置文档信息   
		$pdf->SetCreator('Helloweba');   
		$pdf->SetAuthor('yueguangguang');   
		$pdf->SetTitle('Welcome to liuzp home');   
		$pdf->SetSubject('TCPDF Tutorial');   
		$pdf->SetKeywords('TCPDF, PDF, PHP'); 

		// 设置页眉和页脚信息   
		$pdf->SetHeaderData('sjdb.png', 30, 'http://www.sujin1688.com', 'liuzp开发',    
			  array(0,64,255), array(0,64,128));   
		$pdf->setFooterData(array(0,64,0), array(0,64,128)); 

		// 设置页眉和页脚字体   
		$pdf->setHeaderFont(Array('stsongstdlight', '', '10'));   
		$pdf->setFooterFont(Array('helvetica', '', '8'));   

		// 设置默认等宽字体   
		$pdf->SetDefaultMonospacedFont('courier');   

		// 设定页边空白
		$pdf->SetMargins(PDF_MARGIN_LEFT, PDF_MARGIN_TOP, PDF_MARGIN_RIGHT);
		$pdf->SetHeaderMargin(PDF_MARGIN_HEADER);
		$pdf->SetFooterMargin(PDF_MARGIN_FOOTER);

		// 设置自动页面中断
		$pdf->SetAutoPageBreak(TRUE, PDF_MARGIN_BOTTOM);

		// 设置图像比例
		$pdf->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// 一些语言相关的字符串的集合（可选）
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$pdf->setLanguageArray($l);
		}

		// ---------------------------------------------------------

		// set font
		$pdf->SetFont('stsongstdlight', '', 12); 

		// add a page
		$pdf->AddPage();

		// output the HTML content
		$pdf->writeHTML($html, true, false, true, false, '');
  

		$pdf->lastPage();

		// ---------------------------------------------------------

		//Close and output PDF document
		$pdf->Output('liuzp.pdf', 'I');
	}
	
	
	public function stringtopdf($string){
		Vendor('TCPDF.tcpdf','','.php');   
		//实例化   
		$pdf = new \TCPDF('P', 'mm', 'A4', true, 'UTF-8', false);   
		   
		// 设置文档信息   
		$pdf->SetCreator('Helloweba');   
		$pdf->SetAuthor('yueguangguang');   
		$pdf->SetTitle('Welcome to helloweba.com!');   
		$pdf->SetSubject('TCPDF Tutorial');   
		$pdf->SetKeywords('TCPDF, PDF, PHP');   
		   
		// 设置页眉和页脚信息   
		$pdf->SetHeaderData('sjdb.png', 30, 'http://www.sujin1688.com', 'liuzp开发',    
			  array(0,64,255), array(0,64,128));   
		$pdf->setFooterData(array(0,64,0), array(0,64,128));   
		   
		// 设置页眉和页脚字体   
		$pdf->setHeaderFont(Array('stsongstdlight', '', '10'));   
		$pdf->setFooterFont(Array('helvetica', '', '8'));   
		   
		// 设置默认等宽字体   
		$pdf->SetDefaultMonospacedFont('courier');   
		   
		// 设置间距   
		$pdf->SetMargins(15, 27, 15);   
		$pdf->SetHeaderMargin(5);   
		$pdf->SetFooterMargin(10);   
		   
		// 设置分页   
		$pdf->SetAutoPageBreak(TRUE, 25);   
		   
		// set image scale factor   
		$pdf->setImageScale(1.25);   
		   
		// set default font subsetting mode   
		$pdf->setFontSubsetting(true);   
		   
		//设置字体   
		$pdf->SetFont('stsongstdlight', '', 14);   
		   
		$pdf->AddPage();   
		   
		   
		$pdf->Write(0,$string,'', 0, 'L', true, 0, false, false, 0);   
		   
		//输出PDF   
		$pdf->Output('liuzp.pdf', 'I');   
	}
	
	
}