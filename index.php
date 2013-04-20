<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="author" content="Pablo Impallari www.impallari.com" />
<title>Font Testing Page v10.0 - Impallari.com/testing</title>
<link type="text/css" href="css/styles.css" rel="stylesheet" charset="utf-8" />
<link type="text/css" href="css/print.css" rel="stylesheet" media="print" charset="utf-8" />
<script src="js/jquery-1.7.2.min.js" type="text/javascript" charset="utf-8"></script>
<script>localStorage.clear();</script>
<script src="js/fontdrag.js" type="text/javascript" charset="utf-8"></script>
<script src="js/otfeatures.js" type="text/javascript" charset="utf-8"></script>
<script src="js/contentEditable.js" type="text/javascript" charset="utf-8"></script>
<script src="js/constants.js" type="text/javascript" charset="utf-8"></script>

<script>
 $(document).ready(function(){
    
    // Tabs
    var tabContainers = $('div.tabs > div');
    $('div.tabs ul.tabNavigation a').click(function () {
        tabContainers.hide().filter(this.hash).show();
        $('div.tabs ul.tabNavigation a').removeClass('selected');
        $(this).addClass('selected');
        return false;
    }).filter(':first').click();
    
    // OT Features Panel
    $('#showhide').click(function () {
        $('#otfeatures').slideToggle("fast", function() {
		    $("#showhide").text($(this).is(':visible') ? "Hide OpenType Features" : "OpenType Features");
		  });
    });

    // OT Features initial Run
    refreshFeatures();
    
    // Grab the text from the JS constant file, and show it
    prepareAndShowFontLayout();

});
</script>
</head>

<body spellcheck="false">
	
<!-- Header -->
<section id="top">
	<header><h1>Drag fonts here!</h1></header>
	<ul id="fonts"></ul>
</section>

<!-- 
OT Features
- This table should be redone in a more sophisticated way, for all OT features, ref http://ilovetypography.com/OpenType/opentype-features.html
- 
 -->
	<div id="toggleotfeatures"><a href="javascript://" id="showhide">OpenType Features</a></div>
	<div id="otfeatures" style="display: none;">
		<table width="100%">
			<tr>
				<td valign="top" width="25%">
					<input type="checkbox" id="kern" onchange="refreshFeatures()" checked>OpenType Kerning</input><br/>
					<input type="checkbox" id="liga" checked onchange="refreshFeatures()">Standard Ligatures</input><br/>
					<input type="checkbox" id="calt" checked onchange="refreshFeatures()">Contextual Alternates</input><br/>
					<br/>
					<input type="checkbox" id="dlig" onchange="refreshFeatures()">Discretionary Ligatures</input><br/>
					<input type="checkbox" id="hlig" onchange="refreshFeatures()">Historical Ligatures</input><br/>
					<input type="checkbox" id="swsh" onchange="refreshFeatures()">Swashes</input><br/>
					<input type="checkbox" id="salt" onchange="refreshFeatures()">Stylistic Alternates</input>
				</td>
				<td valign="top" width="25%">
					<input type="radio" name="smcp" checked onchange="refreshFeatures()">SmallCaps Off</input><br/>
					<input type="radio" id="fake-smcp" name="smcp" onchange="refreshFeatures()">Fake SmallCaps</input><br/>
					<input type="radio" id="smcp" name="smcp" onchange="refreshFeatures()">True SmallCaps</input><br/>
					<input type="checkbox" id="c2sc" onchange="refreshFeatures()">Capitals to Small Caps</input>					
				</td>
				<td valign="top" width="25%">
					<input type="radio" name="numsty" checked onchange="refreshFeatures()">Default Figures Style</input><br/>
					<input type="radio" id="lnum" name="numsty" onchange="refreshFeatures()">Lining Figures</input><br/>
					<input type="radio" id="onum" name="numsty" onchange="refreshFeatures()">Oldstyle Figures</input><br/>
					<br/>
					<input type="radio" name="numspc" checked onchange="refreshFeatures()">Default Figures Width</input><br/>
					<input type="radio" id="pnum" name="numspc" onchange="refreshFeatures()">Proportional Figures</input><br/>
					<input type="radio" id="tnum" name="numspc" onchange="refreshFeatures()">Tabular Figures</input>
				</td>
				<td valign="top" width="25%">
					<input type="checkbox" id="frac" name="frac" onchange="refreshFeatures()">Fractions</input><br/>
					<input type="checkbox" id="zero" onchange="refreshFeatures()">Slashed zero</input><br/>
					<br/>
					<input type="checkbox" id="ordn" onchange="refreshFeatures()">Ordinals</input><br/>
					<br/>
					<input type="checkbox" id="sups" onchange="refreshFeatures()">Superiors</input><br/>
					<input type="checkbox" id="sinf" onchange="refreshFeatures()">Inferiors</input><br/>
					<input type="checkbox" id="numr" onchange="refreshFeatures()">Numerator</input><br/>
					<input type="checkbox" id="dnom" onchange="refreshFeatures()">Denominator</input>
				</td>
			</tr>
			<tr>
				<td colspan="4" valign="top">
				   <input type="checkbox" id="ss01" onchange="refreshFeatures()">ss01</input> &nbsp; 
				   <input type="checkbox" id="ss02" onchange="refreshFeatures()">ss02</input> &nbsp; 
				   <input type="checkbox" id="ss03" onchange="refreshFeatures()">ss03</input> &nbsp; 
				   <input type="checkbox" id="ss04" onchange="refreshFeatures()">ss04</input> &nbsp; 
				   <input type="checkbox" id="ss05" onchange="refreshFeatures()">ss05</input> &nbsp; 
				   <input type="checkbox" id="ss06" onchange="refreshFeatures()">ss06</input> &nbsp; 
				   <input type="checkbox" id="ss07" onchange="refreshFeatures()">ss07</input> &nbsp; 
				   <input type="checkbox" id="ss08" onchange="refreshFeatures()">ss08</input> &nbsp; 
				   <input type="checkbox" id="ss09" onchange="refreshFeatures()">ss09</input> &nbsp; 
				   <input type="checkbox" id="ss10" onchange="refreshFeatures()">ss10</input><br/>
				</td>
			</tr>
			<tr>
				<td colspan="4" valign="top">
				   <input type="checkbox" id="ss11" onchange="refreshFeatures()">ss11</input> &nbsp; 
				   <input type="checkbox" id="ss12" onchange="refreshFeatures()">ss12</input> &nbsp; 
				   <input type="checkbox" id="ss13" onchange="refreshFeatures()">ss13</input> &nbsp; 
				   <input type="checkbox" id="ss14" onchange="refreshFeatures()">ss14</input> &nbsp; 
				   <input type="checkbox" id="ss15" onchange="refreshFeatures()">ss15</input> &nbsp; 
				   <input type="checkbox" id="ss16" onchange="refreshFeatures()">ss16</input> &nbsp; 
				   <input type="checkbox" id="ss17" onchange="refreshFeatures()">ss17</input> &nbsp; 
				   <input type="checkbox" id="ss18" onchange="refreshFeatures()">ss18</input> &nbsp; 
				   <input type="checkbox" id="ss19" onchange="refreshFeatures()">ss19</input> &nbsp; 
				   <input type="checkbox" id="ss20" onchange="refreshFeatures()">ss20</input><br/>
				</td>
			</tr>
			<tr>
				<td colspan="3">
					<p style="margin: 0 0 6px;">Recommended CSS:</p>
					<p id="csscode"></p>
				</td>
			</tr>			
		</table>
		
	</div>
<!-- End OT features -->

<section id="custom">

	<div class="tabs">
	  <!-- Navigation (Ideally, this should be outside the "custom" section, so the navigation's font does not change.) -->
	  <ul class="tabNavigation">
	    <li><a href="#headlines">Headlines</a></li>
	    <li><a href="#text">Text</a></li>
	    <li><a href="#adhesion">adhesion</a></li>
	    <li><a href="#hamburgefonstiv">hamburgefonstiv</a></li>
	    <li><a href="#lowercases">a-z</a></li>
	    <li><a href="#caps">Words</a></li>
	    <li><a href="#allcaps">Caps</a></li>
	    <li><a href="#layout">Layout</a></li>
	    <li><a href="#lettering">Lettering</a></li>
	    <li><a href="#kern">Kern</a></li>
	    <li><a href="#hinting">Hinting</a></li>
	    <li><a href="#latin">Latin</a></li>
	    <li><a href="#nonlatin">More</a></li>
	  </ul>
	
	  <!-- Headlines -->
	  <div id="headlines">
		<!-- <div style="white-space: nowrap; overflow: hidden; width: 920px;"> -->
		<div style="white-space: nowrap; overflow: hidden; width: 920px;"></div>
	  </div>
	  
	  <!-- Text -->
	  <div id="text" style="width: 920px;">
			<div class="textsettingCol1"></div>
			<div class="textsettingCol2"></div>
	  </div>

	  <!-- adhesion -->
	  <div id="adhesion">
	  		<div style="white-space: nowrap; overflow: hidden; width: 920px;"></div>			
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<div style="width: 920px;">
				<div class="textsettingCol1"></div>
				<div class="textsettingCol2"></div>
			</div>
	  </div>

	  <!-- hamburgefonstiv -->
	  <div id="hamburgefonstiv">
	  		<div style="white-space: nowrap; overflow: hidden; width: 920px;" ></div>				
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<div style="width: 920px;">
				<div class="textsettingCol1"></div>
				<div class="textsettingCol2"></div>
			</div>
	  </div>

	  <!-- Lowercases a-z -->
	  <div id="lowercases">
	  		<div style="white-space: nowrap; overflow: hidden; width: 920px;"></div>				
			<p>&nbsp;</p>
			<p>&nbsp;</p>
			<div style="width: 920px;">
				<div class="textsettingCol1"></div>
				<div class="textsettingCol2"></div>
			</div>
	  </div>

	  <!-- Caps -->
	  <div id="caps">
	  		<div style="width: 920px;"></div>				
	  </div>

	  <!-- All Caps -->
	  <div id="allcaps">
	  		<div style="width: 920px;"></div>				
	  </div>

	  <!-- Layout -->
	  <div id="layout">
	  		<div style="width: 920px;" contenteditable="true">
				<p class="sizelabel">Heading 60px, Subhead 24px, Body 16px</p>
				<p style="font-size: 60px;">Doubts over insect-bite treatment</p>
				<p style="font-size: 24px;">People should consider using a cold, wet cloth to treat insect bites instead of turning to over-the-counter remedies, experts say. Prof Michael Siva-Jothy, from Sheffield University's Department of Animal and Plant Sciences, recruited 29 brave volunteers to test the theory further, watching the bedbugs as they found a place to feed and removing them only as they were about to bite.</p>
				<p>&nbsp;</p>
				<div class="multicolumn3">
					<p>An investigation has concluded that there is little evidence that creams, painkillers and anti-inflammatories often used for bites actually work. In any case, said Drug and Therapeutics Bulletin researchers, the reactions got better by themselves in most cases. Midges, mosquitoes, flies, fleas and bed-bugs account for most bites. A variety of remedies are sold over the counter in pharmacies to relieve the itching, pain and swelling. 
					Other scientists have suggested that swapping thicker fur for clothes was a way of making insect bites and parasitic infestations less likely. 
					Prof Mark Pagel, an evolutionary biologist at the University of Reading, said that biting parasites remain a major cause of disease and death worldwide, making them a potentially enormous evolutionary pressure on early man.</p>
				</div>
				<p>&nbsp;</p>
				<p>&nbsp;</p>
				<p style="font-size: 24px;">Cold flannel ‘best’</p>
				<p>&nbsp;</p>
				<div class="multicolumn3">
					<p>Researchers from the journal reviewed a host of data and evidence published on insect-bite treatments. It concluded in many cases treatments for insect bites had not actually been tested for such purposes. It said medical help should clearly be sought if serious symptoms, such as infections or anaphylactic shock, developed. But it said for simple bites a flannel or cloth soaked in cold water often worked best - despite advice from official bodies, such as NHS Choices, suggesting treatments should be used. David Phizackerley, the deputy editor of the journal, said: “People are using these treatments so they should know there is no evidence they work. [Most] bites will get better on their own.” 
					Hungry bugs placed on shaved arms were more likely to try to feed compared with those on unshaved arms, the journal Biology Letters reported. Researchers say the hair slows down the bed bugs and warns the victim. Pest controllers say the UK is currently experiencing a steep rise in the number of bed bug infestations. Prof Michael Siva-Jothy, from Sheffield University's Department of Animal and Plant Sciences, recruited 29 brave volunteers to test the theory further, watching the bedbugs as they found a place to feed and removing them only as they were about to bite. 
					This tallies with other studies which look at how humans came to be relatively less hairy than apes.</p>
					<p>&nbsp;</p>
					<p>1. Preface</p>
					<p>2. Pre-Hot 100 era</p>
					<p>3. Hot 100 era</p>
					<p>4. Sources</p>
					<p>5. See also</p>
					<p>&nbsp;</p>
					<p>He found that more layers of both longer visible hairs and finer, “vellus” hairs near the surface appeared to work as a deterrent to the insects, with the finer hairs also acting as an early warning system.
					Continue reading the main story
					“Start Quote
					If you have a heavy coat of long thick hairs it is easier for parasites to hide”
					Professor Siva-Jothy Sheffield University
					Prof Siva-Jothy said: “Our findings show that more body hairs mean better detection of parasites - the hairs have nerves attached to them and provide us with the ability to detect displacement.”
					He said they also slowed down the insect as it searched for a tasty spot to bite.
					“The results have implications for understanding why we look the way we do, what selective forces might have driven us to look the way we do, and may even provide insight for better understanding of how to reduce biting insects’ impact on humans.”
					However, even though men are naturally hairier than women, they do not appear to be bitten less often.
					Professor Siva-Jothy suggested this pointed to an evolutionary battle between bed bugs and their prey, with the insects adapting to automatically head for relatively hairless bits of the body, such as wrists and ankles.
					He added that extreme hairiness might also be more of a disadvantage than an advantage.
					If you have a heavy coat of long thick hairs it is easier for parasites to hide, even if you can detect them. “Our proposal is that we retain the fine covering because it aids detection and if we lost all hair, even the relatively invisible fine hair, our detection ability goes right down.”</p>
				</div>
				<p>&nbsp;</p>
			</div>				
	  </div>

	  <!-- Lettering Sheet -->
	  <div id="lettering">
	  		<div contenteditable="true" style="width: 880px; text-align: center; padding: 20px 20px;">
				<p class="sizelabel">Lettering Sheet 72 points</p>
				<p style="font-size: 72px;">A B C D E F G H I J K L M N O P Q R S T U V W X Y Z<br />
				a b c d e f g h i j k l m n o p q r s t u v w x y z<br />
				1 2 3 4 5 6 7 8 9 0<br /><br />
				( { [ . , ¡ ! ¿ ? * ' ‘ ’ " “ ” ] } )<br />
				$ € £ % @ &amp; ¶ § ¢ † ‡ </p>
				<p>&nbsp;</p>
			</div>				
	  </div>

	  <!-- Kerning -->
	  <div id="kern">
	  		<div style="width: 920px;" contenteditable="true">
				<p class="sizelabel">22px</p>
				<p style="font-size: 22px;">
				AABACADAEAFAGAHAIAJAKALAMANAOAPAQARASATAUAVAWAXAYAZA<br />
				BABBCBDBEBFBGBHBIBJBKBLBMBNBOBPBQBRBSBTBUBVBWBXBYBZB<br />
				CACBCCDCECFCGCHCICJCKCLCMCNCOCPCQCRCSCTCUCVCWCXCYCZC<br />
				DADBDCDDEDFDGDHDIDJDKDLDMDNDODPDQDRDSDTDUDVDWDXDYDZD<br />
				EAEBECEDEEFEGEHEIEJEKELEMENEOEPEQERESETEUEVEWEXEYEZE<br />
				FAFBFCFDFEFFGFHFIFJFKFLFMFNFOFPFQFRFSFTFUFVFWFXFYFZF<br />
				GAGBGCGDGEGFGGHGIGJGKGLGMGNGOGPGQGRGSGTGUGVGWGXGYGZG<br />
				HAHBHCHDHEHFHGHHIHJHKHLHMHNHOHPHQHRHSHTHUHVHWHXHYHZH<br />
				IAIBICIDIEIFIGIHIIJIKILIMINIOIPIQIRISITIUIVIWIXIYIZI<br />
				JAJBJCJDJEJFJGJHJIJJKJLJMJNJOJPJRJSJTJUJVJWJXJYJZJ<br />
				KAKBKCKDKEKFKGKHKIKJKKLKMKNKOKPKQKRKSKTKUKVKWKXKYKZK<br />
				LALBLCLDLELFLGLHLILJLKLLMLNLOLPLQLRLSLTLULVLWLXLYLZL<br />
				MAMBMCMDMEMFMGMHMIMJMKMLMMNMOMPMQMRMSMTMUMVMWMXMYMZM<br />
				NANBNCNDNENFNGNHNINJNKNLNMNNONPNQNRNSNTNUNVNWNXNYNZN<br />
				OAOBOCODOEOFOGOHOIOJOKOLOMONOOPOQOROSOTOUOVOWOXOYOZO<br />
				PAPBPCPDPEPFPGPHPIPJPKPLPMPNPOPPQPRPSPTPUPVPWPXPYPZP<br />
				QAQBQCQDQEQFQGQHQIQJQKQLQMQNQOQPQQRQSQTQUQVQWQXQYQZQ<br />
				RARBRCRDRERFRGRHRIRJRKRLRMRNRORPRQRRSRTRURVRWRXRYRZR<br />
				SASBSCSDSESFSGSHSISJSKSLSMSNSOSPSQSRSSTSUSVSWSXSYSZS<br />
				TATBTCTDTETFTGTHTITJTKTLTMTNTOTPTQTRTSTTUTVTWTXTYTZT<br />
				UAUBUCUDUEUFUGUHUIUJUKULUMUNUOUPUQURUSUTUUVUWUXUYUZU<br />
				VAVBVCVDVEVFVGVHVIVJVKVLVMVNVOVPVQVRVSVTVUVVWVXVYVZV<br />
				WAWBWCWDWEWFWGWHWIWJWKWLWMWNWOWPWQWRWSWTWUWVWWXWYWZW<br />
				XAXBXCXDXEXFXGXHXIXJXKXLXMXNXOXPXQXRXSXTXUXVXWXXYXZX<br />
				YAYBYCYDYEYFYGYHYIYJYKYLYMYNYOYPYQYRYSYTYUYVYWYYZY<br />
				ZAZBZCZDZEZFZGZHZIZJZKZLZMZNZOZPZQZRZSZTZUZVZWZXZYZZ<br />
				<br />
				aabacadaeafagahaiajakalamanaoapaqarasatauavawaxayaza<br />
				babbcbdbebfbgbhbibjbkblbmbnbobpbqbrbsbtbubvbwbxbybzb<br />
				cacbccdcecfcgchcicjckclcmcncocpcqcrcsctcucvcwcxcyczc<br />
				dadbdcddedfdgdhdidjdkdldmdndodpdqdrdsdtdudvdwdxdydzd<br />
				eaebecedeefegeheiejekelemeneoepeqereseteuevewexeyeze<br />
				fafbfcfdfeffgfhfifjfkflfmfnfofpfqfrfsftfufvfwfxfyfzf<br />
				gagbgcgdgegfgghgigjgkglgmgngogpgqgrgsgtgugvgwgxgygzg<br />
				hahbhchdhehfhghhihjhkhlhmhnhohphqhrhshthuhvhwhxhyhzh<br />
				iaibicidieifigihiijikiliminioipiqirisitiuiviwixiyizi<br />
				jajbjcjdjejfjgjhjijjkjljmjnjojpjrjsjtjujvjwjxjyjzj<br />
				kakbkckdkekfkgkhkikjkklkmknkokpkqkrksktkukvkwkxkykzk<br />
				lalblcldlelflglhliljlkllmlnlolplqlrlsltlulvlwlxlylzl<br />
				mambmcmdmemfmgmhmimjmkmlmmnmompmqmrmsmtmumvmwmxmymzm<br />
				nanbncndnenfngnhninjnknlnmnnonpnqnrnsntnunvnwnxnynzn<br />
				oaobocodoeofogohoiojokolomonoopoqorosotouovowoxoyozo<br />
				papbpcpdpepfpgphpipjpkplpmpnpoppqprpsptpupvpwpxpypzp<br />
				qaqbqcqdqeqfqgqhqiqjqkqlqmqnqoqpqqrqsqtquqvqwqxqyqzq<br />
				rarbrcrdrerfrgrhrirjrkrlrmrnrorprqrrsrtrurvrwrxryrzr<br />
				sasbscsdsesfsgshsisjskslsmsnsospsqsrsstsusvswsxsyszs<br />
				tatbtctdtetftgthtitjtktltmtntotptqtrtsttutvtwtxtytzt<br />
				uaubucudueufuguhuiujukulumunuoupuqurusutuuvuwuxuyuzu<br />
				vavbvcvdvevfvgvhvivjvkvlvmvnvovpvqvrvsvtvuvvwvxvyvzv<br />
				wawbwcwdwewfwgwhwiwjwkwlwmwnwowpwqwrwswtwuwvwwxwywzw<br />
				xaxbxcxdxexfxgxhxixjxkxlxmxnxoxpxqxrxsxtxuxvxwxxyxzx<br />
				yaybycydyeyfygyhyiyjykylymynyoypyqyrysytyuyvywyyzy<br />
				zazbzczdzezfzgzhzizjzkzlzmznzozpzqzrzsztzuzvzwzxzyzz<br />
				<br />
				Aar Abo Act Adj Aer Aft Aga Ahe Aie Aji Ake Alm Amo Ano Aoa App Aqu Art Ass Att Aug Ave Awa Axe Aye Azo Bal Bbn Bcc Bdj Ber Bfd Bga Bhu Bie Bji Bkl Bli Bmo Bni Boa Bpi Bqu Brt Bss Btl But Bve Bwa Bxl Bye Bzo Cal Cbn Ccn Cdj Cer Cfi Cga Che Cie Cjn Ckl Cle Cmo Cnl Coa Cpl Cqu Crl Css Ctl Cul Cvl Cwl Cxl Cyi Czo Dal Dbn Dci Ddj Der Dfl Dga Dhr Die Dji Dkl Dli Dmo Dnu Don Dpi Dqu Dri Dsl Dtl Dul Dvl Dwl Dxl Dya Dzn Ear Ebe Ech Edw Een Efo Ega Ehr Eit Ejo Ekn Eld Emp Ens Eob Epa Equ Ero Est Eth Euc Eva Ewa Exe Eyo Eze Fal Fbo Fci Fdj Fer Ffu Fgn Fhi Fil Fjo Fkl Fli Fmi Fnl Fol Fpi Fqu Fra Fst Fto Ful Fvl Fwl Fxi Fyi Fzi Gal Gbo Gch Gdj Ger Gfl Ggl Ghi Gil Gjl Gke Gli Gmo Gnl Gol Gpi Gqu Gra Gst Gto Gut Gve Gwl Gxi Gyn Gzn Har Hbo Hct Hdj Her Hfl Hga Hhe Hie Hji Hke Hlm Hmo Hno Hon Hpl Hqu Hrt Hss Htt Hue Hve Hwa Hxe Hyu Hzi Ian Ibo Ict Idj Ier Ift Iga Ihe Iie Ijo Ike Ilm Imo Ino Ion Ipl Iqu Irt Iss Ita Iut Ive Iwa Ixe Iyo Izo Jap Jbo Jct Jdj Jer Jfn Jgu Jhe Jie Jjl Jkl Jlm Jmo Jno Jon Jpl Jqu Jrt Jss Jtt Jut Jve Jwa Jxe Jyn Jzt Kan Kbo Kci Kdj Ker Kfn Kga Khe Kie Kjl Kkn Klm Kmo Kno Kon Kpl Kqu Krt Kss Kti Kui Kve Kwa Kxe Kye Kzo Lam Lbo Lct Ldj Len Lft Lga Lhe Lie Lju Lke Llm Lmo Lno Lon Lpl Lqu Lrt Lss Ltt Luc Lve Lwa Lxe Lye Lzt Mar Mbu Mct Mdj Mer Mfl Mga Mhe Mie Mji Mke Mlf Mmi Mnu Mon Mpl Mqu Mrt Mss Mtt Mut Mvl Mwa Mxe Myu Mzi Nam Nbu Nct Ndj Nel Nfl Nga Nhi Nie Njn Nke Nlo Nmi Nnu Non Npr Nqu Nrt Nst Ntu Nul Nvd Nwa Nxe Nyi Nzu Oan Obu Oct Odj Oer Ofa Oga Ohe Oie Oja Oke Olf Omi Onu Oon Opl Oqu Ort Oss Ott Out Ovl Owa Oxe Oye Ozo Par Pbl Pct Pdj Per Pfe Pgs Phi Pie Pji Pki Pla Pml Pnu Pon Ppl Pqu Prt Psa Pts Pul Pvc Pwi Pxl Pyn Pzl Qal Qbo Qct Qdj Qer Qfi Qga Qhe Qie Qji Qke Qlm Qmo Qno Qoa Qpp Qqu Qrt Qss Qtt Qui Qve Qwa Qxe Qyo Qzo Rad Rbi Rct Rdj Ren Rfe Rgs Rha Ria Rji Rkl Rli Rms Rni Roa Rpi Rqu Rrt Rsi Rtd Rut Rvi Rwl Rxi Ryn Rzi Sar Sbo Sct Sdl Ser Sfo Sgi She Sie Sja Ski Slo Smi Sno Sol Spe Squ Srt Sst Stt Sut Sve Swa Sxe Syl Szo Tar Tba Tcm Tdi Ter Tfl Tgi The Tie Tji Tke Tlm Tmo Tno Tol Tpi Tqu Trt Tsi Tti Tut Tvl Twl Txl Tyl Tzo Ual Ubi Uct Udj Uer Ufc Uga Uhi Uie Uji Uke Ulm Umo Uno Uol Upp Uqu Urt Uss Utl Uui Uvl Uwl Uxe Uye Uzo Val Vbo Vct Vdj Ver Vft Vga Vhe Vie Vjl Vki Vlm Vmo Vno Vol Vpi Vqu Vrl Vsi Vtt Vut Vvl Vwl Vxl Vyl Vzi Wal Wbo Wcl Wdj Wer Wfi Wga Whe Wie Wjl Wke Wlm Wmo Wno Wol Wpi Wqu Wrl Wsi Wtt Wut Wvl Wwl Wxl Wya Wzl Xal Xbo Xce Xdj Xer Xft Xga Xhe Xie Xjl Xki Xlm Xmo Xno Xol Xpi Xqu Xrl Xsi Xtt Xut Xvl Xwl Xxl Xye Xzi Yal Ybo Yci Ydj Yer Yfl Yga Yhe Yie Yjo Ykl Yli Ymo Yno Yol Ypi Yqu Yrl Ysi Ytt Yut Yvl Ywl Yxl Yyl Yzi Zan Zbr Zco Zdj Zer Zfl Zga Zhe Zie Zji Zke Zlm Zmo Zno Zol Zpi Zqu Zro Zsn Zti Zut Zvl Zwl Zxl Zyl Zzl<br />
				<br />
				01020304050607080900<br />
				91929394959697989909<br />
				81828384858687889808<br />
				71727374757677879707<br />
				61626364656676869606<br />
				51525354556575859505<br />
				41424344546474849404<br />
				31323343536373839303<br />
				21223242526272829202<br />
				11213141516171819101<br />
				<br />
				.1.2.3.4.5.6.7.8.9.0.<br />
				,1,2,3,4,5,6,7,8,9,0,<br />
				-1-2-3-4-5-6-7-8-9-0-<br />
				–1–2–3–4–5–6–7–8–9–0–<br />
				<br />
				-a-b-c-d-e-f-g-h-i-j-k-l-m-n-o-p-q-r-s-t-u-v-w-x-y-z-<br />
				–a–b–c–d–e–f–g–h–i–j–k–l–m–n–o–p–q–r–s–t–u–v–w–x–y–z–<br />
				—a—b—c—d—e—f—g—h—i—j—k—l—m—n—o—p—q—r—s—t—u—v—w—x—y—z—<br />
				-A-B-C-D-E-F-G-H-I-J-K-L-M-N-O-P-Q-R-S-T-U-V-W-X-Y-Z-<br />
				–A–B–C–D–E–F–G–H–I–J–K–L–M–N–O–P–Q–R–S–T–U–V–W–X–Y–Z–<br />
				—A—B—C—D—E—F—G—H—I—J—K—L—M—N—O—P—Q—R—S—T—U—V—W—X—Y—Z—<br />
				<br />
				.a.b.c.d.e.f.g.h.i.j.k.l.m.n.o.p.q.r.s.t.u.v.w.x.y.z.<br />
				,a,b,c,d,e,f,g,h,i,j,k,l,m,n,o,p,q,r,s,t,u,v,w,x,y,z,<br />
				.A.B.C.D.E.F.G.H.I.J.K.L.M.N.O.P.Q.R.S.T.U.V.W.X.Y.Z.<br />
				,A,B,C,D,E,F,G,H,I,J,K,L,M,N,O,P,Q,R,S,T,U,V,W,X,Y,Z,<br />
				a; b; c; d; e; f; g; h; i; j; k; l; m; n; o; p; q; r; s; t; u; v; w; x; y; z;<br />
				a: b: c: d: e: f: g: h: i: j: k: l: m: n: o: p: q: r: s: t: u: v: w: x: y: z:<br />
				A; B; C; D; E; F; G; H; I; J; K; L; M; N; O; P; Q; R; S; T; U; V; W; X; Y; Z;<br />
				A: B: C: D: E: F: G: H: I: J: K: L: M: N: O: P: Q: R: S: T: U: V: W: X: Y: Z:<br />
				<br />
				//a//b//c//d//e//f//g//h//i//j//k//l//m//n//o//p//q//r//s//t//u//v//w//y//z//<br />
				//A//B//C//D//E//F//G//H//I//J//K//L//M//N//O//P//Q//R//S//T//U//V//W//X//Y//Z//<br />
				<br />
				A?B?C?D?E?F?G?H?I?J?K?L?M?N?O?P?Q?R?S?T?U?V?W?X?Y?Z?<br />
				a?b?c?d?e?f?g?h?i?j?k?l?m?n?o?p?q?r?s?t?u?v?w?x?y?z?<br />
				a! b! c! d! e! f! g! h! i! j! k! l! m! n! o! p! q! r! s! t! u! v! w! x! y! z!<br />
				A! B! C! D! E! F! G! H! I! J! K! L! M! N! O! P! Q! R! S! T! U! V! W! X! Y! Z!<br />
				<br />
				“A” “B” “C” “D” “E” “F” “G” “H” “I” “J” “K” “L” “M” “N” “O” “P” “Q” “R” “S” “T” “U” “V” “W” “X” “Y” “Z”<br />
				“a” “b” “c” “d” “e” “f” “g” “h” “i” “j” “k” “l” “m” “n” “o” “p” “q” “r” “s” “t” “u” “v” “w” “x” “y” “z”<br />
				‘A’ ‘B’ ‘C’ ‘D’ ‘E’ ‘F’ ‘G’ ‘H’ ‘I’ ‘J’ ‘K’ ‘L’ ‘M’ ‘N’ ‘O’ ‘P’ ‘Q’ ‘R’ ‘S’ ‘T’ ‘U’ ‘V’ ‘W’ ‘X’ ‘Y’ ‘Z’<br />
				‘a’ ‘b’ ‘c’ ‘d’ ‘e’ ‘f’ ‘g’ ‘h’ ‘i’ ‘j’ ‘k’ ‘l’ ‘m’ ‘n’ ‘o’ ‘p’ ‘q’ ‘r’ ‘s’ ‘t’ ‘u’ ‘v’ ‘w’ ‘x’ ‘y’ ‘z’<br />
				’a’b’c’d’e’f’g’h’i’j’k’l’m’n’o’p’q’r’s’t’u’v’w’x’y’z’<br />
				’A’B’C’D’E’F’G’H’I’J’K’L’M’N’O’P’Q’R’S’T’U’V’W’X’Y’Z’<br />
				<br />
				$12 $23 $34 $45 $56 $67 $78 $89 $90 $01<br />
				€12 €23 €34 €45 €56 €67 €78 €89 €90 €01<br />
				£12 £23 £34 £45 £56 £67 £78 £89 £90 £01<br />
				¥12 ¥23 ¥34 ¥45 ¥56 ¥67 ¥78 ¥89 ¥90 ¥01<br />
				12¢ 23¢ 34¢ 45¢ 56¢ 67¢ 78¢ 89¢ 90¢ 01¢<br />
				<br />
				(a) (b) (c) (d) (e) (f) (g) (h) (i) (j) (k) (l) (m) (n) (o) (p) (q) (r) (s) (t) (u) (v) (w) (x) (y) (z) (A) (B) (C) (D) (E) (F) (G) (H) (I) (J) (K) (L) (M) (N) (O) (P) (Q) (R) (S) (T) (U) (V) (W) (X) (Y) (Z) {a} {b} {c} {d} {e} {f} {g} {h} {i} {j} {k} {l} {m} {n} {o} {p} {q} {r} {s} {t} {u} {v} {w} {x} {y} {z} {A} {B} {C} {D} {E} {F} {G} {H} {I} {J} {K} {L} {M} {N} {O} {P} {Q} {R} {S} {T} {U} {V} {W} {X} {Y} {Z} [a] [b] [c] [d] [e] [f] [g] [h] [i] [j] [k] [l] [m] [n] [o] [p] [q] [r] [s] [t] [u] [v] [w] [x] [y] [z] [A] [B] [C] [D] [E] [F] [G] [H] [I] [J] [K] [L] [M] [N] [O] [P] [Q] [R] [S] [T] [U] [V] [W] [X] [Y] [Z]<br />
				<br />
				WOW.” ,’ ,” .’ ?” ?’ !” !’<br /><br />
				ď! ď, ď. ď; ď? ďa ďh ďk ďl ďm ďo ďt ďu ďá ďž<br />
				Ľ. Ľa Ľu Ľú<br />
				ľ, ľ. ľ: ľ; ľa ľb ľg ľh ľk ľm ľn ľo ľs ľt ľu ľv ľú ľč ľň ľš<br />
				ť! ť" ť) ť, ť- ť. ť: ť; ť? ť` ťa ťc ťd ťj ťk ťm ťn ťo ťr ťs ťt ťu ťá ťž ť“<br />
				</p>
			</div>				
	  </div>

	  <!-- Hinting -->
	  <div id="hinting">
	  		<div style="width: 920px;" contenteditable="true">
				
				<p id="userAgent" class="sizelabel"><script>document.getElementById('userAgent').innerHTML = navigator.userAgent;</script></p><p>&nbsp;</p>
				
				<p class="sizelabel">48px</p>
				<p class="hints-lower" style="font-size: 48px;"></p>
				<p class="hints-caps" style="font-size: 48px;"></p>
				<p class="hints-numbers" style="font-size: 48px;"></p>
				<p>&nbsp;</p>

	  		</div>
	  </div>

	  <!-- Latin -->
	  <div id="latin">
	  		<div style="width: 920px;" contenteditable="true">

				<p class="sizelabel">Diacritics for all the 104 Latin Languages</p>
				<p style="font-size: 30px;">À Á Â Ã Ä Å Ā Ă Ą Ǻ Ȁ Ȃ Æ Ǽ Ć Ç Ĉ Ċ Č Ď Đ Ð Ḍ Ǳ ǲ Ǆ ǅ È É Ê Ë Ē Ĕ Ė Ę Ẽ Ě Ẹ Ȅ Ȇ Ə Ǵ Ĝ Ğ Ġ Ģ Ĥ Ħ Ḥ Ĭ Ì Í Î Ï İ Ĩ Ī Į Ị Ȉ Ȋ Ĳ Ĵ Ķ Ĺ Ļ Ľ Ŀ Ł Ǉ ǈ Ñ Ń Ņ Ň Ṅ Ŋ Ǌ ǋ Ò Ó Ô Õ Ö Ō Ŏ Ő Ø Ǿ Ǫ Ọ Ȍ Ȏ Œ Þ Ŕ Ŗ Ř Ṛ Ȑ Ȓ Ś Ŝ Š Ș Ş Ṣ Ŧ Ť Ț Ţ Ṭ Ù Ú Û Ü Ũ Ū Ŭ Ů Ű Ų Ụ Ȕ Ȗ Ẁ Ẃ Ẅ Ŵ Ý Ŷ Ÿ Ỳ Ỹ Ź Ż Ž Ẓ</p>
				<p style="font-size: 30px;">à á â ã ä å ā ă ą ǻ ȁ ȃ æ ǽ ć ç ĉ ċ č ď đ ð ḍ ǳ ǆ è é ê ë ē ĕ ė ę ě ẽ ẹ ȅ ȇ ə ǵ ĝ ğ ġ ģ ĥ ħ ḥ ì í î ï ĩ ī į ĭ ị ȉ ȋ ĳ ĵ ķ ĸ ĺ ļ ľ ŀ ł ǉ ń ŉ ņ ň ñ ṅ ŋ ǌ ò ó ô õ ö ø ō ŏ ő ǿ ǫ ọ ȍ ȏ œ þ ŕ ŗ ř ṛ ȑ ȓ ś ŝ š ș ş ṣ ß ŧ ť ț ţ ṭ ù ú û ü ũ ū ŭ ů ű ų ụ ȕ ȗ µ μ ẁ ẃ ẅ ŵ ý ÿ ŷ ỳ ỹ ź ż ž ẓ</p>
				<p>&nbsp;</p>
				<p class="sizelabel">Diacritics for Vietnamese</p>
				<p style="font-size: 30px;">À Á Â Ầ Ấ Ẫ Ẩ Ậ Ã Ă Ằ Ắ Ẵ Ẳ Ặ Ả Ạ Đ È É Ê Ề Ế Ễ Ể Ệ Ẽ Ẻ Ẹ Ì Í Ĩ Ỉ Ị Ò Ó Ô Ồ Ố Ỗ Ổ Ộ Õ Ỏ Ơ Ờ Ớ Ỡ Ở Ợ Ọ Ù Ú Ũ Ủ Ư Ừ Ứ Ữ Ử Ự Ụ Ỳ Ý Ỹ Ỷ Ỵ</p>
				<p style="font-size: 30px;">à á â ầ ấ ẫ ẩ ậ ã ă ằ ắ ẻ ẳ ặ ả ạ đ è é ê ề ế ễ ể ệ ẽ ẻ ẹ ì í ĩ ỉ ị ò ó ô ồ ố ỗ ổ ộ õ ỏ ơ ờ ớ ỡ ở ợ ọ ù ú ũ ủ ư ừ ứ ữ ử ự ụ ỳ ý ỹ ỷ ỵ</p>
				<p>&nbsp;</p>
				
				<p class="sizelabel">Azeri</p>
				<p style="font-size: 26px;">Zəfər, jaketini də papağını da götür, bu axşam hava çox soyuq olacaq.</p><p>&nbsp;</p>
				
				<p class="sizelabel">Catalan</p>
				<p style="font-size: 26px;">Jove xef, porti whisky amb quinze glaçons d'hidrogen, coi!</p><p>&nbsp;</p>
				
				<p class="sizelabel">Croatian</p>
				<p style="font-size: 26px;">Gojazni đačić s biciklom drži hmelj i finu vatu u džepu nošnje.</p><p>&nbsp;</p>
				
				<p class="sizelabel">Czech</p>
				<p style="font-size: 26px;">Nechť již hříšné saxofony ďáblů rozzvučí síň úděsnými tóny waltzu, tanga a quickstepu</p><p>&nbsp;</p>
				
				<p class="sizelabel">Danish</p>
				<p style="font-size: 26px;">Høj bly gom vandt fræk sexquiz på wc</p><p>&nbsp;</p>
				
				<p class="sizelabel">Dutch</p>
				<p style="font-size: 26px;">Lynx c.q. vos prikt bh: dag zwemjuf!</p><p>&nbsp;</p>

				<p class="sizelabel">Esperanto</p>
				<p style="font-size: 26px;">Eble ĉiu kvazaŭ-deca fuŝĥoraĵo ĝojigos homtipon</p><p>&nbsp;</p>
				
				<p class="sizelabel">Estonian</p>
				<p style="font-size: 26px;">Põdur Zagrebi tšellomängija-följetonist Ciqo külmetas kehvas garaažis</p><p>&nbsp;</p>
				
				<p class="sizelabel">Filipino</p>
				<p style="font-size: 26px;">Ang buko ay para sa tao dahil wala nang pwedeng mainom na gatas.</p><p>&nbsp;</p>
				
				<p class="sizelabel">Finnish</p>
				<p style="font-size: 26px;">Törkylempijävongahdus Albert osti fagotin ja töräytti puhkuvan melodian</p><p>&nbsp;</p>
				
				<p class="sizelabel">French</p>
				<p style="font-size: 26px;">Buvez de ce whisky que le patron juge fameux</p><p>&nbsp;</p>
				
				<p class="sizelabel">West Frisian</p>
				<p style="font-size: 26px;">Alve bazige froulju wachtsje op dyn komst </p><p>&nbsp;</p>
				
				<p class="sizelabel">German</p>
				<p style="font-size: 26px;">Victor jagt zwölf Boxkämpfer quer über den großen Sylter Deich</p><p>&nbsp;</p>
				
				<p class="sizelabel">Hungarian</p>
				<p style="font-size: 26px;">Jó foxim és don Quijote húszwattos lámpánál ülve egy pár bűvös cipőt készít</p><p>&nbsp;</p>
				
				<p class="sizelabel">Icelandic</p>
				<p style="font-size: 26px;">Kæmi ný öxi hér, ykist þjófum nú bæði víl og ádrepa. </p><p>&nbsp;</p>
				
				<p class="sizelabel">Irish</p>
				<p style="font-size: 26px;">D'fhuascail Íosa Úrmhac na hÓighe Beannaithe pór Éava agus Ádhaimh</p><p>&nbsp;</p>
				
				<p class="sizelabel">Italian</p>
				<p style="font-size: 26px;">In quel campo si trovan funghi in abbondanza.</p><p>&nbsp;</p>

				<p class="sizelabel">Latvian</p>
				<p style="font-size: 26px;">Muļķa hipiji turpat brīvi mēģina nogaršot celofāna žņaudzējčūsku.</p><p>&nbsp;</p>
				
				<p class="sizelabel">Lithuanian</p>
				<p style="font-size: 26px;">Įlinkdama fechtuotojo špaga sublykčiojusi pragręžė apvalų arbūzą </p><p>&nbsp;</p>

				<p class="sizelabel">Norwegian</p>
				<p style="font-size: 26px;">Vår sære Zulu fra badeøya spilte jo whist og quickstep i min taxi.</p><p>&nbsp;</p>

				<p class="sizelabel">Polish</p>
				<p style="font-size: 26px;">Jeżu klątw, spłódź Finom część gry hańb!</p><p>&nbsp;</p>
				
				<p class="sizelabel">Portuguese</p>
				<p style="font-size: 26px;">Luís argüia à Júlia que «brações, fé, chá, óxido, pôr, zângão» eram palavras do português.</p><p>&nbsp;</p>
				
				<p class="sizelabel">Romanian</p>
				<p style="font-size: 26px;">Muzicologă în bej vând whisky și tequila, preț fix.</p><p>&nbsp;</p>

				<p class="sizelabel">Serbian (also applies to Croatian and Bosnian)</p>
				<p style="font-size: 26px;">Gojazni đačić s biciklom drži hmelj i finu vatu u džepu nošnje.</p><p>&nbsp;</p>
				
				<p class="sizelabel">Slovak</p>
				<p style="font-size: 26px;">Kŕdeľ ďatľov učí koňa žrať kôru. </p><p>&nbsp;</p>
				
				<p class="sizelabel">Slovenian</p>
				<p style="font-size: 26px;">Šerif bo za vajo spet kuhal domače žgance. Piškur molče grabi fižol z dna cezijeve hoste.</p><p>&nbsp;</p>
				
				<p class="sizelabel">Spanish</p>
				<p style="font-size: 26px;">El veloz murciélago hindú comía feliz cardillo y kiwi. ¡qué figurota exhibe! La cigüeña tocaba el saxofón ¿Detrás del palenque de paja?</p><p>&nbsp;</p>
				
				<p class="sizelabel">Swedish</p>
				<p style="font-size: 26px;">Yxskaftbud, ge vår WC-zonmö IQ-hjälp.</p><p>&nbsp;</p>

				<p class="sizelabel">Turkish</p>
				<p style="font-size: 26px;">Fahiş bluz güvencesi yağdırma projesi çöktü.</p><p>&nbsp;</p>
				
				<!-- long -->

	  			<p class="sizelabel">Albanian</p>
				<p style="font-size: 16px;">Mbasi njohja e dinjitetit të lindur të të drejtave të barabarta dhe të patjetërsueshme të të gjithë anëtarëve të familjes njerëzore është themeli i lirisë, drejtësisë dhe paqes në botë; mbasi mosrespektimi dhe përbuzja e të drejtave të njeriut ka cuar drejt akteve barbare, të cilat kanë ofenduar ndërgjegjen e njerëzimit, dhe mbasi krijimi i botës në të cilën njerëzit do të gëzojnë lirinë e fjalës, të besimit dhe lirinë nga frika e skamja është proklamuar si dëshira më e lartë e cdo njeriu; mbasi është e nevojshme që të drejtat e njeriut të mbrohen me dispozita juridike, kështu që njeriu të mos jetë i shtrënguar që në pikën e fundit t’i përvishet kryengritjes kundër tiranisë dhe shtypjes; mbasi është e nevojshme që të nxitet zhvillimi i marrëdhënieve miqësore midis kombeve; mbasi popujt e Kombeve të Bashkuara vërtetuan përsëri në Kartë besimin e tyre në të drejtat themelore të njeriut, në dinjitetin dhe vlerën e personit të njeriut dhe barazinë midis burrave dhe grave dhe mbasi vendosën që të nxitin përparimin shoqëror dhe të përmirësojnë nivelin e jetës në liri të plotë; mbasi shtetet anëtare u detyruan që, në bashkëpunim me Kombet</p><p>&nbsp;</p>
				
				<p class="sizelabel">Dutch (Nederlands)</p>
				<p style="font-size: 16px;">Overwegende, dat erkenning van de inherente waardigheid en van de gelijke en onvervreemdbare rechten van alle leden van de mensengemeenschap grondslag is voor de vrijheid, gerechtigheid en vrede in de wereld; overwegende, dat terzijdestelling van en minachting voor de rechten van de mens geleid hebben tot barbaarse handelingen, die het geweten van de mensheid geweld hebben aangedaan en dat de komst van een wereld, waarin de mensen vrijheid van meningsuiting en geloof zullen genieten, en vrij zullen zijn van vrees en gebrek, is verkondigd als het hoogste ideaal van iedere mens; overwegende, dat het van het grootste belang is, dat de rechten van de mens beschermd worden door de suprematie van het recht, opdat de mens niet gedwongen worde om in laatste instantie zijn toevlucht te nemen tot opstand tegen tyrannie en onderdrukking; overwegende, dat het van het grootste belang is om de ontwikkeling van vriendschappelijke betrekkingen tussen de naties te bevorderen; overwegende, dat de volkeren van de Verenigde Naties in het Handvest hun vertrouwen in de fundamentele rechten van de</p><p>&nbsp;</p>
				
				<p class="sizelabel">Estonian</p>
				<p style="font-size: 16px;">Pidades silmas, et inimkonna kõigi liikmete väärikuse, nende võrdsuse ning võõrandamatute õiguste tunnustamine on vabaduse, õigluse ja üldise rahu alus; ja pidades silmas, et inimõiguste põlastamine ja hülgamine on viinud barbaarsusteni, mis piinavad inimkonna südametunnistust, ja et sellise maailma loomine, kus inimestel on veendumuste ja sõnavabadus ning kus nad ei tarvitse tunda hirmu ega puudust, on inimeste üllaks püüdluseks kuulutatud; ja pidades silmas vajadust, et inimõigusi kaitseks seaduse võim selleks, et inimene ei oleks sunnitud viimase abinõuna üles tõusma türannia ja rõhumise vastu; ja pidades silmas, et on vaja kaasa aidata sõbralike suhete arendamisele rahvaste vahel ja; pidades silmas,et ühinenud rahvaste perre kuuluvad rahavad on põhikirjas kinnitanud oma usku inimese põhiõigustesse, inimisiksuse väärikusse ja väärtusse ning meeste ja naiste võrdõiguslikkusesse ning on otsustanud kaasa aidata sotsiaalsele progressile ja elutingimuste parandamisele suurema vabaduse juures; ja pidades silmas,et liikmesriigid on kohustatud koostöös Ühinenud Rahvaste</p><p>&nbsp;</p>
				
				<p class="sizelabel">Finnish (Suomi)</p>
				<p style="font-size: 16px;">Kun ihmiskunnan kaikkien jäsenten luonnollisen arvon ja heidän yhtäläisten ja luovuttamattomien oikeuksiensa tunnustaminen on vapauden, oikeudenmukaisuuden ja rauhan perustana maailmassa, kun ihmisoikeuksia on väheksytty tai ne on jätetty huomiota vaille, on tapahtunut raakalaistekoja, jotka ovat järkyttäneet ihmiskunnan omaatuntoa, ja kun kansojen korkeimmaksi päämääräksi on julistettu sellaisen maailman luominen, missä ihmiset voivat vapaasti nauttia sanan ja uskon vapautta sekä elää vapaina pelosta ja puutteesta, kun on välttämätöntä, että ihmisoikeudet turvataan oikeusjärjestyksellä, jotta ihmisten ei olisi pakko viimeisenä keinona nousta kapinaan pakkovaltaa ja sortoa vastaan, kun on tähdellistä edistää ystävällisten suhteiden kehittymistä kansojen välille, kun Yhdistyneiden Kansakuntien kansat ovat peruskirjassa vahvistaneet uskonsa ihmisten perusoikeuksiin, ihmisyksilön arvoon ja merkitykseen sekä miesten ja naisten yhtäläisiin oikeuksiin ja kun ne ovat ilmaisseet vakaan tahtonsa edistää sosiaalista kehitystä ja parempien elämisen ehtojen aikaansaamista vapaammissa oloissa</p><p>&nbsp;</p>
				
				<p class="sizelabel">French (Français)</p>
				<p style="font-size: 16px;">Considérant que la reconnaissance de la dignité inhérente à tous les membres de la famille humaine et de leurs droits égaux et inaliénables constitue le fondement de la liberté, de la justice et de la paix dans le monde, considérant que la méconnaissance et le mépris des droits de l’homme ont conduit à des actes de barbarie qui révoltent la conscience de l’humanité et que l’avènement d’un monde où les êtres humains seront libres de parler et de croire, libérés de la terreur et de la misère, a été proclamé comme la plus haute aspiration de l’homme, considérant qu’il est essentiel que les droits de l’homme soient protégés par un régime de droit pour que l’homme ne soit pas contraint, en suprême recours, à la révolte contre la tyrannie et l’oppression, considérant qu’il est essentiel d’encourager le développement de relations amicales entre nations, considérant que dans la charte les peuples des Nations Unies ont proclamé à nouveau leur foi dans les droits fondamentaux de l’homme, dans la dignité et la valeur de la personne humaine, dans l’égalité des droits des hommes et des femmes, et qu’ils se sont déclarés résolus à favoriser le progrès social</p><p>&nbsp;</p>
				
				<p class="sizelabel">German (Deustsch)</p>
				<p style="font-size: 16px;">Da die Anerkennung der angeborenen Würde und der gleichen und unveräußerlichen Rechte aller Mitglieder der Gemeinschaft der Menschen die Grundlage von Freiheit, Gerechtigkeit und Frieden in der Welt bildet, da die Nichtanerkennung und Verachtung der Menschenrechte zu Akten der Barbarei geführt haben, die das Gewissen der Menschheit mit Empörung erfüllen, und da verkündet worden ist, daß einer Welt, in der die Menschen Rede- und Glaubensfreiheit und Freiheit von Furcht und Not genießen, das höchste Streben des Menschen gilt, da es notwendig ist, die Menschenrechte durch die Herrschaft des Rechtes zu schützen, damit der Mensch nicht gezwungen wird, als letztes Mittel zum Aufstand gegen Tyrannei und Unterdrückung zu greifen, da es notwendig ist, die Entwicklung freundschaftlicher Beziehungen zwischen den Nationen zu fördern, da die Völker der Vereinten Nationen in der Charta ihren Glauben an die grundlegenden Menschenrechte, an die Würde und den Wert der menschlichen Person und an die Gleichberechtigung von Mann und Frau erneut bekräftigt und beschlossen haben, den sozialen</p><p>&nbsp;</p>
				
				<p class="sizelabel">Hungarian</p>
				<p style="font-size: 16px;">Tekintettel arra, hogy az emberiség családja minden egyes tagja méltóságának, valamint egyenlő és elidegeníthetetlen jogainak elismerése alkotja a szabadság, az igazság és a béke alapját a világon, tekintettel arra, hogy az emberi jogok el nem ismerése és semmibevevése az emberiség lelkiismeretét fellázító barbár cselekményekhez vezetett, és hogy az ember legfőbb vágya egy olyan világ eljövetele, amelyben az elnyomástól, valamint a nyomortól megszabadult emberi lények szava és meggyőződése szabad lesz, tekintettel annak fontosságára, hogy az emberi jogokat a jog uralma védelmezze, nehogy az ember végső szükségében a zsarnokság és az elnyomás elleni lázadásra kényszerüljön, tekintettel arra, hogy igen lényeges a nemzetek közötti baráti kapcsolatok kifejeződésének előmozdítása, tekintettel arra, hogy az Alapokmányban az Egyesült Nemzetek népei újból hitet tettek az alapvető emberi jogok, az emberi személyiség méltósága és értéke, a férfiak és nők egyenjogúsága mellett, valamint kinyilvánították azt az elhatározásukat, hogy elősegítik a szociális haladást és nagyobb szabadság mellett</p><p>&nbsp;</p>
				
				<p class="sizelabel">Icelandic (Íslenska)</p>
				<p style="font-size: 16px;">Það ber að viðurkenna, að hver maður sé jafnborinn til virðingar og réttinda, er eigi verði af honum tekin, og er þetta undirstaða frelsis, réttlætis og friðar i heiminum. Hafi mannréttindi verið fyrir borð borin og lítilsvirt, hefur slíkt haft í för með sér siðlausar athafnir, er ofboðið hafa samvizku mannkynsins, enda hefur því verið yfir lýst, að æðsta markmið almennings um heim allan sé að skapa veröld, þar sem menn fái notið málfrelsis, trúfrelsis og óttaleysis um einkalíf afkomu. Mannréttindi á að vernda með lögum. Að öðrum kosti hljóta menn að grípa til þess örþrifaráðs að rísa upp gegn kúgun og ofbeldi. Það er mikilsvert að efla vinsamleg samskipti þjóða í milli. Í stofnskrá sinni hafa Sameinuðu þjóðdirnar lýst yfir trú sinni á grundvallaratriði mannréttinda, á göfgi og gildi mannsins og jafnrétti karla og kvernna, enda munu þær beita sér fyrir félagslegum framförum og betri lífsafkomu með auknu frelsi manna. Aðildarríkin hafa bundizt samtökum um að efla almenna virðingu fyrir og gæzlu hinna mikilsverðustu mannréttinda í samráði við Sameinuðu þjóðirnar. Til þess að slík samtök megi sem</p><p>&nbsp;</p>
				
				<p class="sizelabel">Irish</p>
				<p style="font-size: 16px;">De Bhrí gurb é aithint dínte dúchais agus chearta comhionanna do-shannta an uile dhuine den chine daonna is foras don tsaorise, don cheartas agus don tsíocháin sa domhan, de Bhrí gur thionscain a neamhaird agus an mí-mheas ar chearta an duine gníomhartha barbartha a chuir uafás ar choinsias an chine daonna, agus go bhfuil forógartha gurb é meanmarc is uaisle ag an gcoitiantacht saol a thabhairt i réim a bhéarfas don duine saoirse chainte agus chreidimh agus saoirse ó eagla agus ó amhgar, de Bhrí go ndearna pobail na Náisiúin Aontaithe sa Chairt dearbhú athuair ar a gcreideamh i gcearta bunúsacha an duine, i ndínit agus i bhfiúntas pearsan an duine agus i gcearta comhionanna fear agus bean, agus gur chinneadar tacú leis an ascnamh sóisalach agus réim maireachtana níos fearr a thabhairt i gcrích faoi shaoirse níos fairsinge, de Bhrí gur ghabhadar na Stát-Chomhaltaí faoi chuing ghealltanais go ndéanfaid, i gcomhar leis na Náisiúin Aontaithe, urraim uile-choiteann éifeachtach d’áirithiú do chearta agus do shaoirsí bunúsacha an duine. De Bhrí go bhfuil sé fíor-thábhachtach, chun an</p><p>&nbsp;</p>
				
				<p class="sizelabel">Italian</p>
				<p style="font-size: 16px;">Considerato che il riconoscimento della dignità inerente a tutti i membri della famiglia umana e dei loro diritti, uguali ed inalienabili, costituisce il fondamento della libertà, della giustizia e della pace nel mondo; considerato che il disconoscimento e il disprezzo dei diritti umani hanno portato ad atti di barbarie che offendono la coscienza dell’umanità, e che l’avvento di un mondo in cui gli esseri umani godano della libertà di parola e di credo e della libertà dal timore e dal bisogno è stato proclamato come la più alta aspirazione dell’uomo; considerato che è indispensabile che i diritti umani siano protetti da norme giuridiche, se si vuole evitare che l’uomo sia costretto a ricorrere, come ultima istanza, alla ribellione contro la tirannia e l’oppressione; considerato che è indispensabile promuovere lo sviluppo di rapporti amichevoli tra le Nazioni; considerato che i popoli delle Nazioni Unite hanno riaffermato nello Statuto la loro fede nei diritti umani fondamentali, nella dignità e nel valore della persona umana, nell’uguaglianza dei diritti dell’uomo e della donna, ed hanno deciso di promuovere il progresso sociale e un miglior tenore di vita in</p><p>&nbsp;</p>

				<p class="sizelabel">Lithuanian</p>
				<p style="font-size: 16px;">Kadangi visų žmonių giminės narių prigimtinio orumo ir lygių bei neatimamų teisių pripažinimas yra laisvės, teisingumo ir taikos pasaulyje pagrindas; kadangi žmogaus teisių nepaisymas ir niekinimas pastūmėjo vykdyti barbariškus aktus, kurie papiktino žmonijos sąžinę, ir didžiausiu paprastų žmonių siekiu buvo paskelbtas pasaulio, kuriame žmonės turi žodžio bei įsitikinimų laisvę ir yra išlaisvinti iš baimės ir skurdo, sukūrimas; kadangi būtina, kad žmogaus teises saugotų įstatymo galia, idant žmogus nebūtų priverstas, nerasdamas jokios kitos išeities, sukilti prieš tironiją ir priespaudą; kadangi būtina skatinti draugiškų tautų santykių plėtrą; kadangi Jungtinių Tautų Chartijoje tautos vėl patvirtino savo tikėjimą pagrindinėmis žmogaus teisėmis, žmogaus, kaip asmenybės, orumu ir vertybe, lygiomis moterų ir vyrų teisėmis ir pasiryžo skatinti socialinę pažangą bei geresnio gyvenimo didesnės laisvės sąlygomis siekį; kadangi valstybės narės yra įsipareigojusios bendradarbiaudamos su Jungtinėmis Tautomis siekti, kad būtų skatinama visuotinė pagarba žmogaus teisėms ir pagrindinėms laisvėms ir jų būtų paisoma; kadangi bendras šių teisių ir laisvių supratimas yra nepaprastai svarbus.</p><p>&nbsp;</p>
				
				<p class="sizelabel">Norwegian, Bokmål (Norsk)</p>
				<p style="font-size: 16px;">Da anerkjennelsen av menneskeverd og like og umistelige rettigheter for alle medlemmer av menneskeslekten er grunnlaget for frihet, rettferdighet og fred i verden, da tilsidesettelse av og forakt for menneskerettighetene har ført til barbariske handlinger som har rystet menneskehetens samvittighet, og da framveksten av en verden hvor menneskene har tale- og trosfrihet og frihet fra frykt og nød, er blitt kunngjort som folkenes høyeste mål, da det er nødvendig at menneskerettighetene blir beskyttet av loven for at menneskene ikke skal tvinges til som siste utvei å gjøre opprør mot tyranni og undertrykkelse, da det er viktig å fremme utviklingen av vennskapelige forhold mellom nasjonene, da De Forente Nasjoners folk i Pakten på ny har bekreftet sin tro på grunnleggende menneskerettigheter, på menneskeverd og på like rett for menn og kvinner og har besluttet å arbeide for sosialt framskritt og bedre levevilkår under større Frihet, da medlemsstatene har forpliktet seg til i samarbeid med De Forente Nasjoner å sikre at menneskerettighetene og de grunnleggende friheter blir alminnelig respektert og overholdt, da en allmenn</p><p>&nbsp;</p>
				
				<p class="sizelabel">Polish (Polski)</p>
				<p style="font-size: 16px;">Zważywszy, że uznanie przyrodzonej godności oraz równych i niezbywalnych praw wszystkich członków wspólnoty ludzkiej jest podstawą wolności, sprawiedliwości i pokoju świata, zważywszy, że nieposzanowanie i nieprzestrzeganie praw człowieka doprowadziło do aktów barbarzyństwa, które wstrząsnęły sumieniem ludzkości, i że ogłoszono uroczyście jako najwznioślejszy cel ludzkości dążenie do zbudowania takiego świata, w którym ludzie korzystać będą z wolności słowa i przekonań oraz z wolności od strachu i nędzy, zważywszy, że konieczne jest zawarowanie praw człowieka przepisami prawa, aby nie musiał—doprowadzony do ostateczności—uciekać się do buntu przeciw tyranii i uciskowi, zważywszy, że konieczne jest popieranie rozwoju przyjaznych stosunków między narodami, zważywszy, że Narody Zjednoczone przywróciły swą wiarę w podstawowe prawa człowieka, godność i wartość jednostki oraz w równouprawnienie mężczyzn i kobiet, oraz wyraziły swe zdecydowanie popierania postępu społecznego i poprawy warunków życia w większej wolności, zważywszy, że Państwa Członkowskie</p><p>&nbsp;</p>
				
				<p class="sizelabel">Portuguese</p>
				<p style="font-size: 16px;">Considerando que o reconhecimento da dignidade inerente a todos os membros da família humana e dos seus direitos iguais e inalienáveis constitui o fundamento da liberdade, da justiça e da paz no mundo; considerando que o desconhecimento e o desprezo dos direitos do Homen conduziram a actos de barbárie que revoltam a consciência daHumanidade e que o advento de um mundo em que os seres humanos sejam livres de falar e de crer, libertos do terror e da miséria, foi proclamado como a mais alta inspiração do Homem; considerando que é essencial a proteção dos direitos do Homem através de um regime de direito, para que o Homem não seja compelido, em supremo recurso, à revolta contra a tirania e a opressão; considerando que é essencial encorajar o desenvolvimento de relações amistosas entre as nações; considerando que, na Carta, os povos das Nações Unidas proclamam, de novo, a sua fé nos direitos fundamentais do Homem, na dignidade e no valor da pessoa humana, na igualdade de direitos dos homens e das mulheres e se declaram resolvidos a favorecer o progresso social e a instaurar melhores condições</p><p>&nbsp;</p>
				
				<p class="sizelabel">Romanian (Româna)</p>
				<p style="font-size: 16px;">Considerînd că recunoașterea demnității inerente tuturor membrilor familiei umane și a drepturilor lor egale și inalienabile constituie fundamentul libertății, dreptății și păcii în lume, considerînd că ignorarea și disprețuirea drepturilor omului au dus la acte de barbarie care revoltă conștiința omenirii și că făurirea unei lumi în care ființele umane se vor bucura de libertatea cuvîntului și a convingerilor și vor fi eliberate de teamă și mizerie a fost proclamată drept cea mai înaltă aspirație a oamenilor, considerînd că este esențial ca drepturile omului să fie ocrotite de autoritatea legii pentru ca omul să nu fie silit să recurgă, ca soluție extremă, la revoltă împotriva tiraniei și asupririi, considerînd că este esențial a se încuraja dezvoltarea relațiilor prietenești între națiuni, considerînd că în Cartă popoarele Organizației Națiunilor Unite au proclamat din nou credința lor în drepturile fundamentale ale omului, în demnitatea și în valoarea persoanei umane, drepturi egale pentru bărbați și femei și că au hotărît să favorizeze progresul social și îmbunătățirea condițiilor de viață în cadrul unei libertăți mai mari, considerînd că statele membre s-au</p><p>&nbsp;</p>
				
				<p class="sizelabel">Slovak (Slovencina)</p>
				<p style="font-size: 16px;">Vo vedomí že uznanie prirodzenej dôstojnosti a rovnych a neodcudzite ľných práv členov ľudskej rodiny je základom slobody, spravodlivosti a mieru na svete, že zneuznanie ľudských práv a pohrdanie nimi viedlo k barbarským činom, ktoré urážajú svedomie ľudstva, a že vybudovanie sveta, v ktorom ľudia, zbavení strachu a núdze, budú sa tešiť slobode prejavu a presvedčenia, bolo vyhlásené za najvyšší cieľ ľudu, že je nutné, aby sa ľudsk práva chránily zákonom, ak nemá byť človek donúteý uchýliť sa, keď všetko ostatné zlyhalo, k odboju proti tyranii a útlaku, že je nutné podporovať rozvoj priateľských vzťahov medzi národmi, že ľud Spojených národov zdoraznil v Charte znovu svoju vieru v základné ľudské práva, v dostojnosť a hodnotu ľudskej osobnosti, v rovnaké práva mužov a žien a že sa rozhodol podporovať sociálny pokrok a vytvoriť lepšie životné podmienky za vačšej slobody, že členské štáty prevzaly závazok zaistiť v spolupráci s Organizáciou Spojeých národov všeobecné uznávanie a zachovávanie ľudských práv a základýých slobod a že rovnaké chápanie týchto práv a slobod má nesmierny význam pre dokonalé</p><p>&nbsp;</p>
				
				<p class="sizelabel">Spanish (Español)</p>
				<p style="font-size: 16px;">Considerando que la libertad, la justicia y la paz en el mundo tienen por base el reconocimiento de la dignidad intrínseca y de los derechos iguales e inalienables de todos los miembros de la familia humana, Considerando que el desconocimiento y el menosprecio de los derechos humanos han originado actos de barbarie ultrajantes para la conciencia de la humanidad; y que se ha proclamado, como la aspiración más elevada del hombre, el advenimiento de un mundo en que los seres humanos, liberados del temor y de la miseria, disfruten de la libertad de palabra y de la libertad de creencias, Considerando esencial que los derechos humanos sean protegidos por un régimen de Derecho, a fin de que el hombre no se vea compelido al supremo recurso de la rebelión contra la tiranía y la opresión, Considerando también esencial promover el desarrollo de relaciones amistosas entre las naciones, Considerando que los pueblos de las Naciones Unidas han reafirmado en la Carta su fe en los derechos fundamentales del hombre, en la dignidad y el valor de la persona humana y en la igualdad de derechos de hombres y mujeres; y se han</p><p>&nbsp;</p>
				
				<p class="sizelabel">Swedish (Svenska)</p>
				<p style="font-size: 16px;">Enär erkännandet av det inneboende värdet hos alla medlemmar av människosläktet och av deras lika och oförytterliga rättigheter är grundvalen för frihet, rättvisa och fred i världen, enär ringaktning och förakt för de mänskliga rättigheterna lett till barbariska gärningar, som upprört mänsklighetens samvete, och enär skapandet av en värld, där människorna åtnjuta yttrandefrihet, trosfrihet samt frihet från fruktan och nöd, kungjorts som folkens högsta strävan, enär det är väsentligt för att icke människan skall tvingas att som en sista utväg tillgripa uppror mot tyranni och förtryck, att de mänskliga rättigheterna skyddas genom lagens överhöghet, enär det är väsentligt att främja utvecklandet av vänskapliga förbindelser mellan nationerna, enär Förenta Nationernas folk i stadgan ånyo uttryckt sin tro på de grundläggande mänskliga rättigheterna, den enskilda människans värdighet och värde samt männens och kvinnornas lika rättigheter, ävensom beslutat främja socialt framåtskridande och bättre levnadsvillkor under större frihet,</p><p>&nbsp;</p>
				
				<p class="sizelabel">Turkish (Türkçe)</p>
				<p style="font-size: 16px;">İnsanlık ailesinin bütün üyelerinde bulunan haysiyetin ve bunların eşit ve devir kabul etmez haklarının tanınması hususunun, hürriyetin, adaletin ve dünya barışının temeli olmasına, ınsan haklarının tanınmaması ve hor görülmesinin insanlık vicdanını isyana sevkeden vahşiliklere sebep olmuş bulunmasına, dehşetten ve yoksulluktan kurtulmuş insanların, içinde söz ve inanma hürriyetlerine sahip olacakları bir dünyanın kurulması en yüksek amaçları oralak ilan edilmiş bulunmasına, ınsanin zulüm ve baskıya karşı son çare olarak ayaklanmaya mecbur kalmaması için insan haklarının bir hukuk rejimi ile korunmasının esaslı bir zaruret olmasına, uluslararasında dostça ilişkiler geliştirilmesini teşvik etmenin esaslı bir zaruret olmasına, birleşmiş Milletler halklarının, Antlaşmada, insanın ana haklarına, insan şahsının haysiyet ve değerine, erkek ve kadınların eşitliğine olan imanlarını bir kere daha ilan etmiş olmalarına ve sosyal ilerlemeyi kolaylaştırmaya, daha geniş bir hürriyet içerisinde daha iyi hayat şartları kurmaya karar verdiklerini beyan etmiş bulunmalarına, üye devletlerin, birleşmiş Milletler Teşkilatı ile işbirliği ederek insan</p><p>&nbsp;</p>
				
				<p class="sizelabel">Welsh (Cymraeg)</p>
				<p style="font-size: 16px;">Gan mai cydnabod urddas cynhenid a hawliau cydradd a phriod holl aelodau’r teulu dynol yw sylfaen rhyddid, cyfiawnder a heddwch yn y byd, gan i anwybyddu a dirmygu hawliau dynol arwain at weithredoedd barbaraidd a dreisiodd gydwybod dynolryw, a bod dyfodiad byd lle y gall pob unigolyn fwynhau rhyddid i siarad a chredu a rhyddid rhag ofn ac angau wedi ei gyhoeddi yn ddyhead uchaf y bobl gyffredin, gan fod yn rhaid amddiffyn hawliau dynol a rheolaeth cyfraith, os nad yw pob unigolyn dan orfod yn y pendraw i wrthryfela yn erbyn gormes a thrais, gan fod yn rhaid hyrwyddo cysylltiadau cyfeillgar rhwng Cenhedloedd, gan fod pobloedd y Cenhedloedd Unedig yn y Siarter wedi ail ddatgan ffydd mewn hawliau sylfaenol yr unigolyn, mewn urddas a gwerth y person dynol ac mewn hawliau cydradd gŵr a gwragedd, ac wedi penderfynu hyrwyddo cynnydd cymdeithasol a safonau byw gwell mewn rhyddid helaethach, gan fod y Gwladwriaethau sy’n Aelodau wedi ymrwymo, mewn cydweithrediad â’r Cenhedloedd Unedig, i sicrhau hyrwyddo parch cyffredinol i hawliau dynol a’r rhyddfreintiau sylfaenol,</p><p>&nbsp;</p>
				
			</div>
	  </div>
	  
	  <!-- Non-Latin -->
	  <div id="nonlatin">
	  		<div style="width: 920px;" contenteditable="true">
				<p class="sizelabel">Arabic</p>
				<p style="font-size: 26px;">صِف خَلقَ خَودِ كَمِثلِ الشَمسِ إِذ بَزَغَت — يَحظى الضَجيعُ بِها نَجلاءَ مِعطارِ</p><p>&nbsp;</p>
				
				<p class="sizelabel">Armenian</p>
				<p style="font-size: 26px;">բել դղյակի ձախ ժամն օֆ ազգությանը ցպահանջ չճշտած վնաս էր և փառք</p>
				<p style="font-size: 26px;">ԲԵԼ ԴՂՅԱԿԻ ՁԱԽ ԺԱՄՆ ՕՖ ԱԶԳՈՒԹՅԱՆԸ ՑՊԱՀԱՆՋ ՉՃՇՏԱԾ ՎՆԱՍ ԷՐ և ՓԱՌՔ</p><p>&nbsp;</p>

				<p class="sizelabel">Bulgarian</p>
				<p style="font-size: 26px;">Ах чудна българска земьо, полюшквай цъфтящи жита.</p><p>&nbsp;</p>

				<p class="sizelabel">Dzongkha</p>
				<p style="font-size: 26px;">ཨ་ཡིག་དཀར་མཛེས་ལས་འཁྲུངས་ཤེས་བློའི་གཏེར༎ ཕས་རྒོལ་ཝ་སྐྱེས་ཟིལ་གནོན་གདོང་ལྔ་བཞིན༎ ཆགས་ཐོགས་ཀུན་བྲལ་མཚུངས་མེད་འཇམ་དབྱངསམཐུས༎ མཧཱ་མཁས་པའི་གཙོ་བོ་ཉིད་འགྱུར་ཅིག།</p><p>&nbsp;</p>

				<p class="sizelabel">Greek</p>
				<p style="font-size: 26px;">Τάχιστη αλώπηξ βαφής ψημένη γη, δρασκελίζει υπέρ νωθρού κυνός</p><p>&nbsp;</p>
				
				<p class="sizelabel">Hebrew</p>
				<p style="font-size: 26px;">כך התרסק נפץ על גוזל קטן, שדחף את צבי למים</p><p>&nbsp;</p>
				
				<p class="sizelabel">Hindi</p>
				<p style="font-size: 26px;">दीवारबंद जयपुर ऐसी दुनिया है जहां लगभग हर दुकान का नाम हिन्दी में लिखा गया है। नामकरण की ऐसी तरतीब हिन्दुस्तान में कम दिखती है। दिल्ली में कॉमनवेल्थ गेम्स के दौरान कनॉट प्लेस और पहाड़गंज की नामपट्टिकाओं को एक समान करने का अभियान चला। पत्रकार लिख</p><p>&nbsp;</p>

				<p class="sizelabel">Japanese</p>
				<p style="font-size: 26px;">いろはにほへと　ちりぬるを　わかよたれそ　つねならむ　うゐのおくやま　けふこえて　あさきゆめみし　ゑひもせす 色は匂へど　散りぬるを　我が世誰ぞ　常ならむ　有為の奥山　今日越えて　浅き夢見じ　酔ひもせず（ん）</p><p>&nbsp;</p>
				
				<p class="sizelabel">Korean</p>
				<p style="font-size: 26px;">키스의 고유조건은 입술끼리 만나야 하고 특별한 기술은 필요치 않다.</p><p>&nbsp;</p>

				<p class="sizelabel">Macedonian</p>
				<p style="font-size: 26px;">Ѕидарски пејзаж: шугав билмез со чудење џвака ќофте и кељ на туѓ цех. </p><p>&nbsp;</p>
				
				<p class="sizelabel">Mongolian</p>
				<p style="font-size: 26px;">Щётканы фермд пийшин цувъя. Бөгж зогсч хэльюү.</p><p>&nbsp;</p>
				
				<p class="sizelabel">Myanmar</p>
				<p style="font-size: 26px;">သီဟိုဠ်မှ ဉာဏ်ကြီးရှင်သည် အာယုဝဍ္ဎနဆေးညွှန်းစာကို ဇလွန်ဈေးဘေးဗာဒံပင်ထက် အဓိဋ္ဌာန်လျက် ဂဃနဏဖတ်ခဲ့သည်။ </p><p>&nbsp;</p>
				
				<p class="sizelabel">Persian</p>
				<p style="font-size: 26px;">بر اثر چنین تلقین و شستشوی مغزی جامعی، سطح و پایه‌ی ذهن و فهم و نظر بعضی اشخاص واژگونه و معکوس می‌شود.</p><p>&nbsp;</p>

				<p class="sizelabel">Russian</p>
				<p style="font-size: 26px;">Съешь же ещё этих мягких французских булок, да выпей чаю.</p><p>&nbsp;</p>

				<p class="sizelabel">Thai</p>
				<p style="font-size: 26px;">นายสังฆภัณฑ์ เฮงพิทักษ์ฝั่ง ผู้เฒ่าซึ่งมีอาชีพเป็นฅนขายฃวด ถูกตำรวจปฏิบัติการจับฟ้องศาล ฐานลักนาฬิกาคุณหญิงฉัตรชฎา ฌานสมาธิ</p><p>&nbsp;</p>

				<p class="sizelabel">Ukrainian</p>
				<p style="font-size: 26px;">Жебракують філософи при ґанку церкви в Гадячі, ще й шатро їхнє п'яне знаємо.</p><p>&nbsp;</p>
				
				<p class="sizelabel">Urdu</p>
				<p style="font-size: 26px;">ر‌ضائی کو غلط اوڑھے بیٹھی ژوب کی قرۃ العین اور عظمٰی کے پاس گھر کے ذخیرے سے آناً فاناً ڈش میں ثابت جو، صراحی میں چائے اور پلیٹ میں زردہ آیا۔</p><p>&nbsp;</p>
				 
			</div>
	  </div>

	</div><!-- end tabs -->

</section>
		
<!-- Footer -->
<section id="pie">
	<p>Font Testing Page version 9.1 By <a href="http://www.impallari.com">Pablo Impallari</a>, <a href="http://www.omnibus-type.com">Pablo Cosgaya</a> and <a href="http://understandingfonts.com/">Dave Crossland</a>. Download the source code and post your comments and suggestions at the <a href="http://www.impallari.com/projects/overview/drag-and-drop-font-testing-page">Project Page</a></p>
	<p>Based on <a href="http://www.fontdragr.com">Fontdragr</a>. Kerning string by <a href="http://www.terminaldesign.com">James Montalbano</a>. Latin text by <a href="http://www.tipo.net.ar">Eduardo Tunni</a>. Pangrams from <a href="http://www.wikipedia.org">Wikipedia</a>. OT Panel reworked from Jonathan Kew's <a href="http://people.mozilla.com/~jkew/opentype-feature-playground.html">OpenType Playground</a> for Mozilla.</p>
</section>

</body>
</html>