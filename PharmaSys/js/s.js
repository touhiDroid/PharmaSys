
/*
 * @author PALATOK
 * khelmuna@gmail.com
 *
 */
 
var TOP = '-200%';
var DOWN = '200%';
var MIDDLE = '25%';

var popDiv1 = "#one_input";
var popDiv2 = "#two_input";
var popDiv3 = "#thre_input";
var popDiv4 = "#for_input";
var popDiv5 = "#pls_wait";

var popTitle1 = "#one_title";
var popTitle2 = "#two_title";
var popTitle3 = "#thre_title";
var popTitle4 = "#for_title";

var popOK1 = "#one_inp_ok";
var popOK2 = "#two_inp_ok";
var popOK3 = "#thre_inp_ok";
var popOK4 = "#for_inp_ok";

var popCancel1 = "#one_inp_cancel";
var popCancel2 = "#two_inp_cancel";
var popCancel3 = "#thre_inp_cancel";
var popCancel4 = "#for_inp_cancel";

var extrabtn1 = '#inline_math';
var extrabtn2 = '#block_math';
var extrabtn3 = '#math_space';
var extrabtn4 = '#clearpage';

var bodyName = "#qbody";
var opt1Name = "#opt1";
var opt2Name = "#opt2";
var opt3Name = "#opt3";
var opt4Name = "#opt4";
var solnName = "#soln";
var serverMSG = '#server_msg';

var showBody = "#showbody";
var showOpt1 = "#showopt1";
var showOpt2 = "#showopt2";
var showOpt3 = "#showopt3";
var showOpt4 = "#showopt4";
var showSoln = "#showsolution";
var showImage = "#problemimg";

var saveProblem = '#btnsave';
var displayResult = "#btnshow";

var selectClass = "#problemClass";
var selectSubject = "#problemSubject";
var selectChapter = "#problemChapter";
var selectAns = '#problemAns';
var selectDifficulty = "#problemDifficulty";
var selectImage = "#input_file";

//selected data
var selectedClass = -1;
var selectedSubject = -1;
var selectedChapter = -1;
var selectedDifficulty = -1;
var selectedAns = -1;
var imageBase64 = '';

var focusClass = "focused";
var focusedPanel = -1;
var animationTime = 500;

var saveProblemScript = 'PHP/save_problem.php';
var getSingleProblemScript = 'PHP/GetSingleProblem.php';
var codeFlag = "";

var lastCursoePosition = 0;

(function ($, undefined) {
    $.fn.getCursorPosition = function () {
        var el = $(this).get(0);
        var pos = 0;
        if ('selectionStart' in el) {
            pos = el.selectionStart;
        } else if ('selection' in document) {
            el.focus();
            var Sel = document.selection.createRange();
            var SelLength = document.selection.createRange().text.length;
            Sel.moveStart('character', -el.value.length);
            pos = Sel.text.length - SelLength;
        }
        return pos;
    };
	
	$.fn.selectRange = function(start, end) {
    if(!end) end = start; 
    return this.each(function() {
        if (this.setSelectionRange) {
            this.focus();
            this.setSelectionRange(start, end);
        } else if (this.createTextRange) {
            var range = this.createTextRange();
            range.collapse(true);
            range.moveEnd('character', end);
            range.moveStart('character', start);
            range.select();
        }
    });
};
})(jQuery);

$(document).ready(function(){
	if(oldId != 0) {
		showWaitDiv();
	}
	initEffects();
});

function initEffects(){
	
	$(popDiv1).css('top', TOP);
	$(popDiv2).css('top', TOP);
	$(popDiv3).css('top', TOP);
	$(popDiv4).css('top', TOP);
	$(popDiv5).css('top', TOP);
	
	$(popDiv1).css('opacity', 1.0);
	$(popDiv2).css('opacity', 1.0);
	$(popDiv3).css('opacity', 1.0);
	$(popDiv4).css('opacity', 1.0);
	$(popDiv5).css('opacity', 1.0);
	
	clearAllFields(1);
	
	$(selectClass).change(function(){
		var clas = $(this).val();
		selectedClass = -1;
		
		$(selectSubject).empty();
		$(selectSubject).attr('disabled', true);
		
		$(selectChapter).empty();
		$(selectChapter).attr('disabled', true);
		
		if(clas == "0") {
			return;
		}
		
		selectedClass = parseInt(clas, 10);
		selectedSubject = 1;
		selectedChapter = 1;
		var inter = selectedSubject - 1;
		
		$(selectSubject).attr('disabled', false);
		var tmpArray = ( selectedClass == 8 ) ? JSCsubjects : (( selectedClass == 9 ) ? SSCsubjects : HSCsubjects);
		$.each(tmpArray, function(key, value){
			$(selectSubject).append($('<option>', { value : key + 1 }).text(value));
		});
		
		$(selectChapter).attr('disabled', false);
		tmpArray = ( selectedClass == 8 ) ? class8Chapters[inter] : (( selectedClass == 9 ) ? class9Chapters[inter] : class11Chapters[inter]);
		$.each(tmpArray, function(key, value){
			$(selectChapter).append($('<option>', { value : key + 1 }).text(value));
		});

	});
	
	$(selectSubject).change(function(){
		$(selectChapter).empty();
		selectedSubject = parseInt($(this).val(), 10);
		selectedChapter = 1;
		var inter = selectedSubject - 1;
		
		var tmpArray = ( selectedClass == 8 ) ? class8Chapters[inter] : (( selectedClass == 9 ) ? class9Chapters[inter] : class11Chapters[inter]);
		$.each(tmpArray, function(key, value){
			$(selectChapter).append($('<option>', { value : key + 1 }).text(value));
		});
		
	});
	
	$(selectChapter).change(function(){
		selectedChapter = parseInt($(this).val(), 10);
	});
	
	$(selectAns).change(function(){
		selectedAns = parseInt($(this).val(), 10);
	});
	
	$(selectDifficulty).change(function(){
		selectedDifficulty = parseInt($(this).val(), 10);
	});
	
	$(selectImage).on('change', function(){
		readImage(this);
	});
	
	$(bodyName).click(function(){
		focusedPanel = 1;
		addFocusClass(bodyName);
	});
	$(solnName).click(function(){
		focusedPanel = 2;
		addFocusClass(solnName);
	});
	$(opt1Name).click(function(){
		focusedPanel = 3;
		addFocusClass(opt1Name);
	});
	$(opt2Name).click(function(){
		focusedPanel = 4;
		addFocusClass(opt2Name);
	});
	$(opt3Name).click(function(){
		focusedPanel = 5;
		addFocusClass(opt3Name);
	});
	$(opt4Name).click(function(){
		focusedPanel = 6;
		addFocusClass(opt4Name);
	});
	
	$(displayResult).click(function(){
		updateDisplay();
	});
	$(saveProblem).click(function(){
		if(confirm('Are You Sure ?')) {
			makeAJAXCall();
		}
	});
	
	$(popCancel1).click(function(){
		hidePopUpDiv(popDiv1);
	});
	$(popCancel2).click(function(){
		hidePopUpDiv(popDiv2);
	});
	$(popCancel3).click(function(){
		hidePopUpDiv(popDiv3);
	});
	$(popCancel4).click(function(){
		hidePopUpDiv(popDiv4);
	});
	
	$(popOK1).click(function(){
		generateCode();
		hidePopUpDiv(popDiv1);
	});
	$(popOK2).click(function(){
		generateCode();
		hidePopUpDiv(popDiv2);
	});
	$(popOK3).click(function(){
		generateCode();
		hidePopUpDiv(popDiv3);
	});
	$(popOK4).click(function(){
		generateCode();
		hidePopUpDiv(popDiv4);
	});
	
	$(extrabtn1).click(function(){
		addToInputPanel('\\(\\mspace5mu  \\mspace5mu\\)', 1);
	});
	$(extrabtn2).click(function(){
		addToInputPanel('\\[  \\]', 1);
	});
	$(extrabtn3).click(function(){
		addToInputPanel('\\mspace5mu');
	});
	$(extrabtn4).click(function() {
		if(confirm('Are You Sure ?')) {
			clearAllFields(2);
		}
	});
	
	getRequestedProblem();
	initMathButtons();
}

function getRequestedProblem() {
	if(oldId == 0) {
		return;
	}
	$.post(getSingleProblemScript, {
		id : oldId
	}).done(function(data){
		hideWaitDiv();
		if(data == 1 || data == 2 || data == 3 || data == 4) {
			alert(data);
			return;
		}
		data = JSON.parse(data);
		//alert(data['id'] + ' ' + data['body']);
		
		$(selectClass).val('' + data['class']);
		$(selectClass).trigger('change');
		
		$(selectSubject).val('' + data['subject']);
		$(selectSubject).trigger('change');
		
		$(selectChapter).val('' + data['chapter']);
		$(selectChapter).trigger('change');
		
		$(selectAns).val('' + data['ans']);
		$(selectAns).trigger('change');
		
		$(selectDifficulty).val('' + data['difficulty']);
		$(selectDifficulty).trigger('change');
		
		imageBase64 = data['image'];
		//$(selectImage).val(imageBase64);
		$(showImage).attr('src', imageBase64);
		
		$(bodyName).val(data['body']);
		$(opt1Name).val(data['option1']);
		$(opt2Name).val(data['option2']);
		$(opt3Name).val(data['option3']);
		$(opt4Name).val(data['option4']);
		$(solnName).val(data['solution']);
		
		$(serverMSG).html('Q.' + data['id'] + ' : ' + (data['comment'] ? data['comment'] : 'No Comment'));
		
		updateDisplay();
		
	});
}

function makeAJAXCall() {
	if(selectedClass <= 0) {
		alert('Select a valid Class');
		return;
	}
	if(selectedAns <= 0) {
		alert('Select Answer');
		return;
	}
	if(selectedDifficulty == 0) {
		alert('Select Difficulty');
		return;
	}
	$(serverMSG).html('Saving Problem ...');
	$.post(saveProblemScript, {
		old_id : oldId,
		problembody : format( $(bodyName).val() ),
		option1 : format( $(opt1Name).val() ),
		option2 : format( $(opt2Name).val() ),
		option3 : format( $(opt3Name).val() ),
		option4 : format( $(opt4Name).val() ),
		image_str : imageBase64,
		solution : format( $(solnName).val() ),
		class	: selectedClass,
		subject : selectedSubject,
		chapter : selectedChapter,
		difficulty : selectedDifficulty,
		ans	: selectedAns,
		math_code : ( searchForMath($(bodyName).val(), $(opt1Name).val(), $(opt2Name).val(), $(opt3Name).val(), $(opt4Name).val()) == true ? 1 : 0 )
				
	}).done(function (data) {
		$(serverMSG).html(data);
	});
}

function searchForMath(s, s1, s2, s3, s4) {
	if(s.indexOf('\\(') > -1 || s.indexOf('\\[') > -1) {
		return true;
	}
	if(s1.indexOf('\\(') > -1 || s1.indexOf('\\[') > -1) {
		return true;
	}
	if(s2.indexOf('\\(') > -1 || s2.indexOf('\\[') > -1) {
		return true;
	}
	if(s3.indexOf('\\(') > -1 || s3.indexOf('\\[') > -1) {
		return true;
	}
	if(s4.indexOf('\\(') > -1 || s4.indexOf('\\[') > -1) {
		return true;
	}
	return false;
}

function clearAllFields(tp) {
	//Initializing input & output Fields
	$(bodyName).val('');
	$(opt1Name).val('');
	$(opt2Name).val('');
	$(opt3Name).val('');
	$(opt4Name).val('');
	$(solnName).val('');
	
	$(showBody).html('');
	$(showOpt1).html('');
	$(showOpt2).html('');
	$(showOpt3).html('');
	$(showOpt4).html('');
	$(showSoln).html('');
	
	//Initializing Select Options
	if(tp == 1) {
		$(selectClass).attr('disabled', false);
		$(selectSubject).attr('disabled', true);
		$(selectChapter).attr('disabled', true);
		
		$(selectClass).val("0");
		$(selectSubject).empty();
		$(selectChapter).empty();
	}
	
	$(selectAns).val('0');
	$(selectDifficulty).val("0");
	$(selectImage).val('');
	
	$(serverMSG).html('');
	
	imageBase64 = '';
	$(showImage).attr('src', imageBase64);
}

function readImage(input) {
	if( input.files && input.files[0] ) {
		var fr = new FileReader();
		fr.onload = function(e) {
			$(showImage).attr('src', e.target.result);
			imageBase64 = e.target.result;
		};
		fr.readAsDataURL( input.files[0], "UTF-8" );
	}
}

function updateDisplay() {
	$(showBody).html( format( $(bodyName).val() ) );
	$(showOpt1).html( format( $(opt1Name).val() ) );
	$(showOpt2).html( format( $(opt2Name).val() ) );
	$(showOpt3).html( format( $(opt3Name).val() ) );
	$(showOpt4).html( format( $(opt4Name).val() ) );
	$(showSoln).html( format( $(solnName).val() ) );
	
	MathJax.Hub.Queue(['Typeset',MathJax.Hub, showBody.substr(1)]);
	MathJax.Hub.Queue(['Typeset',MathJax.Hub, showOpt1.substr(1)]);
	MathJax.Hub.Queue(['Typeset',MathJax.Hub, showOpt2.substr(1)]);
	MathJax.Hub.Queue(['Typeset',MathJax.Hub, showOpt3.substr(1)]);
	MathJax.Hub.Queue(['Typeset',MathJax.Hub, showOpt4.substr(1)]);
	MathJax.Hub.Queue(['Typeset',MathJax.Hub, showSoln.substr(1)]);
}

function format(p) {
	return p.replace(/\n/g, '<br>');
}

function addFocusClass(ID){
	$(bodyName).removeClass(focusClass);
	$(opt1Name).removeClass(focusClass);
	$(opt2Name).removeClass(focusClass);
	$(opt3Name).removeClass(focusClass);
	$(opt4Name).removeClass(focusClass);
	$(solnName).removeClass(focusClass);
	$(ID).addClass(focusClass);
}

function initMathButtons() {
	$("#fraction").click(function(){
		var ret = showTwoInputDiv('\\frac{x}{y}', 'x', 'y');
		if(ret == false) error();
		else codeFlag = "fraction";
	});
	$("#powern").click(function(){
		var ret = showTwoInputDiv('x^n', 'x', 'n');
		if(ret == false) error();
		else codeFlag = "powern";
	});
	$('#pwrfrac').click(function(){
		var ret = showThreeInputDiv('x^{\\frac{a}{b}}', 'x', 'a', 'b');
		if(ret == false) error();
		else codeFlag = "pwrfrac";
	});
	$("#nestedpower").click(function(){
		var ret = showThreeInputDiv('x^{y^z}', 'x', 'y', 'z');
		if(ret == false) error();
		else codeFlag = "nestedpower";
	});
	$("#suffix").click(function(){
		var ret = showTwoInputDiv('x_k', 'x', 'k');
		if(ret == false) error();
		else codeFlag = "suffix";
	});
	$("#barx").click(function(){
		var ret = showOneInputDiv('\\bar{x}', 'x');
		if(ret == false) error();
		else codeFlag = "barx";
	});
	$("#suffpwr").click(function(){
		var ret = showThreeInputDiv('x^n_m', 'x', 'n', 'm');
		if(ret == false) error();
		else codeFlag = "suffpwr";
	});
	$("#sqrtx").click(function(){
		var ret = showOneInputDiv('\\sqrt{x}', 'x');
		if(ret == false) error();
		else codeFlag = "sqrtx";
	});
	$("#sqrtnx").click(function(){
		var ret = showTwoInputDiv('\\sqrt[n]{x}', 'x', 'n');
		if(ret == false) error();
		else codeFlag = "sqrtnx";
	});
	$("#ddxfx").click(function(){
		var ret = showTwoInputDiv('\\frac{d}{dx} f(x)', 'f(x)', 'x');
		if(ret == false) error();
		else codeFlag = "ddxfx";
	});
	$("#intgrab").click(function(){
		var ret = showFourInputDiv('\\int_{a}^{b} f(x) dx', 'a', 'b', 'f(x)', 'x');
		if(ret == false) error();
		else codeFlag = "intgrab";
	});
	$("#intgrfx").click(function(){
		var ret = showTwoInputDiv('\\int f(x) dx', 'f(x)', 'x');
		if(ret == false) error();
		else codeFlag = "intgrfx";
	});
	$("#alpha").click(function(){
		addToInputPanel('\\alpha');
	});
	$("#beta").click(function(){
		addToInputPanel('\\beta');
	});
	$("#gamma").click(function(){
		addToInputPanel('\\gamma');
	});
	$("#delta").click(function(){
		addToInputPanel('\\delta');
	});
	$("#pi").click(function(){
		addToInputPanel('\\pi');
	});
	$("#mu").click(function(){
		addToInputPanel('\\mu');
	});
	$("#omega").click(function(){
		addToInputPanel('\\omega');
	});
	$("#Omega").click(function(){
		addToInputPanel('\\Omega');
	});
	$("#theta").click(function(){
		addToInputPanel('\\theta');
	});
	$("#thetacirc").click(function(){
		var ret = showOneInputDiv('\\theta^\\circ','\\( \\theta \\)');
		if(ret == false) error();
		else codeFlag = "thetacirc";
	});
	$("#sin").click(function(){
		addToInputPanel('\\sin{  }', 6);
	});
	$("#cos").click(function(){
		addToInputPanel('\\cos{  }', 6);
	});
	$("#tan").click(function(){
		addToInputPanel('\\tan{  }', 6);
	});
	$("#cot").click(function(){
		addToInputPanel('\\cot{  }', 6);
	});
	$("#sec").click(function(){
		addToInputPanel('\\sec{  }', 6);
	});
	$("#cosec").click(function(){
		addToInputPanel('\\text{cosec}\\mspace5mu{  }', 24);
	});
	$("#sinx").click(function(){
		addToInputPanel('\\sin^{-1}{  }', 11);
	});
	$("#cosx").click(function(){
		addToInputPanel('\\cos^{-1}{  }', 11);
	});
	$("#tanx").click(function(){
		addToInputPanel('\\tan^{-1}{  }', 11);
	});
	$("#cot_x").click(function(){
		addToInputPanel('\\cot^{-1}{  }', 11);
	});
	$("#secx").click(function(){
		addToInputPanel('\\sec^{-1}{  }', 11);
	});
	$("#cosecx").click(function(){
		addToInputPanel('\\text{cosec}^{-1}\\mspace5mu{  }', 29);
	});
	$("#logx").click(function(){
		addToInputPanel('\\log{  }', 6);
	});
	$("#lognx").click(function(){
		var ret = showTwoInputDiv('\\log_{n}{x}','n','x');
		if(ret == false) error();
		else codeFlag = "lognx";
	});
	$("#lnx").click(function(){
		addToInputPanel('\\ln{  }', 5);
	});
	$("#ex").click(function(){
		addToInputPanel('\\text{e}^{  }', 11);
	});
	$('#lambda').click(function(){
		addToInputPanel('\\lambda');
	});
	$("#nCr").click(function(){
		var ret = showTwoInputDiv('^nC\\mspace5mu^r', 'n', 'r');
		if(ret == false) error();
		else codeFlag = "nCr";
	});
	$("#nPr").click(function(){
		var ret = showTwoInputDiv('^nP\\mspace5mu^r', 'n', 'r');
		if(ret == false) error();
		else codeFlag = "nPr";
	});
	$("#binom").click(function(){
		var ret = showTwoInputDiv('\\binom n k','n','x');
		if(ret == false) error();
		else codeFlag = "binom";
	});
	$("#sum").click(function(){
		addToInputPanel('\\sum');
	});
	$("#sumLim").click(function(){
		var ret = showTwoInputDiv('\\sum_{i=a}^{b}','a','b');
		if(ret == false) error();
		else codeFlag = "sumLim";
	});
	$("#Z").click(function(){
		addToInputPanel('\\Bbb Z');
	});
	$("#R").click(function(){
		addToInputPanel('\\rm I R');
	});
	$("#R+").click(function(){
		addToInputPanel('\\rm I R^+');
	});
	$("#R-").click(function(){
		addToInputPanel('\\rm I R^-');
	});
	$("#vex").click(function(){
		var ret = showOneInputDiv('\\vec{v}','v');
		if(ret == false) error();
		else codeFlag = "vex";
	});
	$("#full_vector").click(function(){
		var hed = '\\vec{v} = a \\hat{i} + b \\hat{j} + c \\hat{k}';
		hed = hed.replace(/ /g, '\\mspace5mu');
		var ret = showFourInputDiv(hed,'v', 'a', 'b', 'c');
		if(ret == false) error();
		else codeFlag = "full_vector";
	});
	$("#cdots").click(function(){
		addToInputPanel('\\cdots');
	});
	$("#because").click(function(){
		addToInputPanel('\\because');
	});
	$("#angle").click(function(){
		addToInputPanel('\\angle');
	});
	$("#arg").click(function(){
		addToInputPanel('\\arg');
	});
	$("#btu").click(function(){
		addToInputPanel('\\bigtriangleup');
	});
	$("#btd").click(function(){
		addToInputPanel('\\bigtriangledown');
	});
	$("#limxn").click(function(){
		var ret = showTwoInputDiv('\\lim_{{x} -> {n}}','x','n');
		if(ret == false) error();
		else codeFlag = "limxn";
	});
	$("#hatn").click(function(){
		var ret = showOneInputDiv('\\hat{n}','n');
		if(ret == false) error();
		else codeFlag = "hatn";
	});
	$("#eta").click(function(){
		addToInputPanel('\\eta');
	});
	$("#hbar").click(function(){
		addToInputPanel('\\hbar');
	});
	$("#pphi").click(function(){
		addToInputPanel('\\Phi');
	});
	$("#partial").click(function(){
		addToInputPanel('\\partial');
	});
	$("#upsilon").click(function(){
		addToInputPanel('\\upsilon');
	});
	$("#therefore").click(function(){
		addToInputPanel('\\therefore');
	});
	$("#hati").click(function(){
		addToInputPanel('\\hat{i}');
	});
	$("#hatj").click(function(){
		addToInputPanel('\\hat{j}');
	});
	$("#hatk").click(function(){
		addToInputPanel('\\hat{k}');
	});
	$("#lrceil").click(function(){
		addToInputPanel('\\lceil  \\rceil', 1);
	});
	$("#lrfloor").click(function(){
		addToInputPanel('\\lfloor  \\rfloor', 1);
	});
	$("#modx").click(function(){
		addToInputPanel('|  |', 1);
	});
	$("#downarrow").click(function(){
		addToInputPanel('\\downarrow');
	});
	$("#uparrow").click(function(){
		addToInputPanel('\\uparrow');
	});
	$("#gg").click(function(){
		addToInputPanel('\\gg');
	});
	$("#ll").click(function(){
		addToInputPanel('\\ll');
	});
	$("#notlt").click(function(){
		addToInputPanel('\\not\\lt');
	});
	$("#notgt").click(function(){
		addToInputPanel('\\not\\gt');
	});
	$("#le").click(function(){
		addToInputPanel('\\le');
	});
	$("#ge").click(function(){
		addToInputPanel('\\ge');
	});
	$("#notle").click(function(){
		addToInputPanel('\\not\\le');
	});
	$("#notge").click(function(){
		addToInputPanel('\\not\\ge');
	});
	$("#neq").click(function(){
		addToInputPanel('\\neq');
	});
	$("#div").click(function(){
		addToInputPanel('\\div');
	});
	$("#times").click(function(){
		addToInputPanel('\\times');
	});
	$("#pm").click(function(){
		addToInputPanel('\\pm');
	});
	$("#mp").click(function(){
		addToInputPanel('\\mp');
	});
	$("#cup").click(function(){
		addToInputPanel('\\cup');
	});
	$("#cap").click(function(){
		addToInputPanel('\\cap');
	});
	$("#subset").click(function(){
		addToInputPanel('\\subset');
	});
	$("#subseteq").click(function(){
		addToInputPanel('\\subseteq');
	});
	$("#subsetneq").click(function(){
		addToInputPanel('\\supsetneq');
	});
	$("#supset").click(function(){
		addToInputPanel('\\supset');
	});
	$("#in").click(function(){
		addToInputPanel('\\in');
	});
	$("#ni").click(function(){
		addToInputPanel('\\ni');
	});
	$("#overleftarrow").click(function(){
		var ret = showOneInputDiv('\\overleftarrow{X}','X');
		if(ret == false) error();
		else codeFlag = "overleftarrow";
	});
	$("#overrightarrow").click(function(){
		var ret = showOneInputDiv('\\overrightarrow{X}','X');
		if(ret == false) error();
		else codeFlag = "overrightarrow";
	});
	$("#overline").click(function(){
		var ret = showOneInputDiv('\\overline{X}','X');
		if(ret == false) error();
		else codeFlag = "overline";
	});
	$("#parallel").click(function(){
		addToInputPanel('\\parallel');
	});
	$("#perp").click(function(){
		addToInputPanel('\\perp');
	});
	$("#Aprime").click(function(){
		var ret = showOneInputDiv('A^\\prime','A');
		if(ret == false) error();
		else codeFlag = "hati";
	});
	$("#propto").click(function(){
		addToInputPanel('\\propto');
	});
	$("#psi").click(function(){
		addToInputPanel('\\Psi');
	});
	$("#rho").click(function(){
		addToInputPanel('\\rho');
	});
	$("#sigma").click(function(){
		addToInputPanel('\\sigma');
	});
	$("#Theta").click(function(){
		addToInputPanel('\\Theta');
	});
	$("#varphi").click(function(){
		addToInputPanel('\\varphi');
	});
	$("#notin").click(function(){
		addToInputPanel('\\notin');
	});
	$("#emptyset").click(function(){
		addToInputPanel('\\emptyset');
	});
	$("#varnothing").click(function(){
		addToInputPanel('\\varnothing');
	});
	$("#rightarrow").click(function(){
		addToInputPanel('\\rightarrow');
	});
	$("#leftarrow").click(function(){
		addToInputPanel('\\leftarrow');
	});
	$("#Leftarrow").click(function(){
		addToInputPanel('\\Leftarrow');
	});
	$("#Rightarrow").click(function(){
		addToInputPanel('\\Rightarrow');
	});
	$("#Longleftrightarrow").click(function(){
		addToInputPanel('\\Longleftrightarrow');
	});
	$("#mapsto").click(function(){
		addToInputPanel('\\mapsto');
	});
	$("#bullet").click(function(){
		addToInputPanel('\\bullet');
	});
	$("#oplus").click(function(){
		addToInputPanel('\\oplus');
	});
	$("#star").click(function(){
		addToInputPanel('\\star');
	});
	$("#approx").click(function(){
		addToInputPanel('\\approx');
	});
	$("#sim").click(function(){
		addToInputPanel('\\sim');
	});
	$("#cong").click(function(){
		addToInputPanel('\\cong');
	});
	$("#equiv").click(function(){
		addToInputPanel('\\equiv');
	});
	$("#infty").click(function(){
		addToInputPanel('\\infty');
	});
	$("#nabla").click(function(){
		addToInputPanel('\\nabla');
	});
	$("#Delta").click(function(){
		addToInputPanel('\\Delta');
	});
	$("#epsilon").click(function(){
		addToInputPanel('\\epsilon');
	});
	$("#phi").click(function(){
		addToInputPanel('\\phi');
	});
	$("#ell").click(function(){
		addToInputPanel('\\ell');
	});

}

function generateCode() {
	var ret, vl;
	var a, b, c, d;
	if(codeFlag == "fraction") {
		a = $('#two_inp_1').val();
		b = $('#two_inp_2').val();
		ret = '\\frac{' + a + '}{' + b + '}';
	}
	else if(codeFlag == "powern") {
		a = $('#two_inp_1').val();
		b = $('#two_inp_2').val();
		ret = '{' + a + '}^{' + b + '}';
	}
	else if(codeFlag == "nestedpower") {
		a = $('#thre_inp_1').val();
		b = $('#thre_inp_2').val();
		c = $('#thre_inp_3').val();
		ret = '{' + a + '}^{{' + b + '}^{' + c + '}}';
	}
	else if(codeFlag == "suffix") {
		a = $('#two_inp_1').val();
		b = $('#two_inp_2').val();
		ret = '{' + a + '}_{' + b + '}';
	}
	else if(codeFlag == "barx") {
		a = $('#one_inp_1').val();
		ret = '\\bar{' + a + '}';
	}
	else if(codeFlag == "suffpwr") {
		a = $('#thre_inp_1').val();
		b = $('#thre_inp_2').val();
		c = $('#thre_inp_3').val();
		ret = '{' + a + '}^{' + b + '}_{' + c + '}';
	}
	else if(codeFlag == "hatn") {
		a = $('#one_inp_1').val();
		ret = '\\hat{' + a+ '}';
	}
	else if(codeFlag == "pwrfrac") {
		a = $('#thre_inp_1').val();
		b = $('#thre_inp_2').val();
		c = $('#thre_inp_3').val();
		ret = '{' + a + '}^{\\frac{' + b + '}{' + c + '}}';
	}
	else if(codeFlag == "sqrtx") {
		a = $('#one_inp_1').val();
		ret = '\\sqrt{' + a + '}';
	}
	else if(codeFlag == "sqrtnx") {
		a = $('#two_inp_1').val();
		b = $('#two_inp_2').val();
		ret = '\\sqrt[' + b + ']{' + a + '}';
	}
	else if(codeFlag == "ddxfx") {
		a = $('#two_inp_1').val();
		b = $('#two_inp_2').val();
		if(!b) b = 'x';
		ret = '\\frac{d}{d' + b + '}' + a;
	}
	else if(codeFlag == "intgrab") {
		a = $('#for_inp_1').val();
		b = $('#for_inp_2').val();
		c = $('#for_inp_3').val();
		d = $('#for_inp_4').val();
		if(!d) d = 'x';
		ret = '\\int_{' + a + '}^{' + b + '} ' + c + ' d{' + d + '}';
	}
	else if(codeFlag == "intgrfx") {
		a = $('#two_inp_1').val();
		b = $('#two_inp_2').val();
		if(!b) b = 'x';
		ret = '\\int ' + a + ' d{' + b + '}';
	}
	else if(codeFlag == 'full_vector') {
		d = $('#for_inp_1').val();
		a = $('#for_inp_2').val();
		b = $('#for_inp_3').val();
		c = $('#for_inp_4').val();
		
		var fst = '';
		if(d) fst = '\\vec{' + d + '} = ';
		
		var aa, bb, cc;
		if(!a) aa = '';
		else if(a.substr(0,1) == '-') aa = '- ' + a.substr(1);
		else aa = a;
		
		if(!b) bb ='';
		else if(b.substr(0,1) == '-') {
			if(a) bb = ' - ' + b.substr(1);
			else bb = '- ' + b.substr(1);
		} else if(a) bb = ' + ' + b;
		else bb = b;
		
		if(!c) cc = '';
		else if(c.substr(0,1) == '-') {
			if(a || b) cc = ' - ' + c.substr(1);
			else cc = '- ' + c.substr(1);
		} else if(a || b) cc = ' + ' + c;
		else cc = c;
		
		if(aa) aa += ' \\hat{i}';
		if(bb) bb += ' \\hat{j}';
		if(cc) cc += ' \\hat{k}';
		
		ret = fst + aa + bb + cc;
		ret = ret.replace(/ /g, '\\mspace5mu');
	}
	else if(codeFlag == "lognx") {
		a = $('#two_inp_1').val();
		b = $('#two_inp_2').val();
		
		if(!b) b = 'x';
		ret = '\\log_{ ' + a + '}{' + b + '}';
	}
	else if(codeFlag == "nCr") {
		a = $('#two_inp_1').val();
		b = $('#two_inp_2').val();
		ret = ' ^{' + a + '}{C}\\mspace5mu^{' + b + '}';
	}
	else if(codeFlag == "nPr") {
		a = $('#two_inp_1').val();
		b = $('#two_inp_2').val();	 
		ret = ' ^{' + a + '}{P}\\mspace5mu^{' + b + '}';
	}
	else if(codeFlag == "binom") {
		a = $('#two_inp_1').val();
		b = $('#two_inp_2').val();
		if(!b) b = 'x';
		ret = '\\binom{'+ a+'}{'+ b+ '}';
	}   
	else if(codeFlag == "thetacirc") {
		a = $('#one_inp_1').val();
		ret = a+'^\\circ';
	}
	else if(codeFlag == "sumLim") {
		a = $('#for_inp_1').val();
		b = $('#for_inp_2').val();
		if(!b) b = 'x';
		ret = '\\sum_{i'+a + '}^{'+b+'}';
	}
	else if(codeFlag == "limxn") {
		a = $('#two_inp_1').val();
		b = $('#two_inp_2').val();
		if(!b) b = 'x';
		ret = '\\lim_{{' + a + '}->{' + b + '}}';
	}
	else if(codeFlag == "vex") {
		a = $('#one_inp_1').val();
		ret = '\\vec{' + a+ '}';
	}
    else if(codeFlag == "overleftarrow") {
		a = $('#one_inp_1').val();
		ret = '\\overleftarrow{' + a + '}';
		
	}
	else if(codeFlag == "overrightarrow") {
		a = $('#one_inp_1').val();
		ret = '\\overrightarrow{' + a + '}';
	}
	else if(codeFlag == "overline") {
		a = $('#one_inp_1').val();
		ret = '\\overline{' + a + '}';
	}
	else if(codeFlag == "Aprime") {
		a = $('#one_inp_1').val();
		ret =  a +'^\\prime ';
	}
	addToInputPanel(ret);
}

function error() {
	alert("Please Close The Current Input Box First !");
}

function showWaitDiv() {
	$(popDiv5).animate({
		top : MIDDLE
	}, animationTime, function() {});
}
function hideWaitDiv() {
	$(popDiv5).animate({
		top : DOWN
	}, animationTime, function() {
		$(popDiv5).css('top', TOP);
	});
}

function showOneInputDiv(tt, a) {
	if(codeFlag != "") return false;
	
	$(popTitle1).html('\\(' + tt + '\\)');
	
	$('#one_txt_1').text(a);
	$('#one_inp_1').focus();
	
	$(popDiv1).animate({
		top : MIDDLE
	}, animationTime, function() {});
	
	MathJax.Hub.Queue(['Typeset', MathJax.Hub, popDiv1.substr(1)]);
	
	return true;
}

function showTwoInputDiv(tt, a, b) {
	if(codeFlag != "") return false;
	
	$(popTitle2).html('\\(' + tt + '\\)');
	
	$('#two_txt_1').text(a);
	$('#two_txt_2').text(b);
	$('#two_inp_1').focus();
	
	$(popDiv2).animate({
		top : MIDDLE
	}, animationTime, function() {});
	
	MathJax.Hub.Queue(['Typeset', MathJax.Hub, popDiv2.substr(1)]);
	
	return true;
}

function showThreeInputDiv(tt, a, b, c) {
	if(codeFlag != "") return false;
	
	$(popTitle3).html('\\(' + tt + '\\)');
	
	$('#thre_txt_1').text(a);
	$('#thre_txt_2').text(b);
	$('#thre_txt_3').text(c);
	$('#thre_inp_1').focus();
	
	$(popDiv3).animate({
		top : MIDDLE
	}, animationTime, function() {});
	
	MathJax.Hub.Queue(['Typeset', MathJax.Hub, popDiv3.substr(1)]);
	
	return true;
}

function showFourInputDiv(tt, a, b, c, d) {
	if(codeFlag != "") return false;
	
	$(popTitle4).html('\\(' + tt + '\\)');
	
	$('#for_txt_1').text(a);
	$('#for_txt_2').text(b);
	$('#for_txt_3').text(c);
	$('#for_txt_4').text(d);
	$('#for_inp_1').focus();
	
	$(popDiv4).animate({
		top : MIDDLE
	}, animationTime, function() {});
	
	MathJax.Hub.Queue(['Typeset', MathJax.Hub, popDiv4.substr(1)]);
	
	return true;
}

function hidePopUpDiv(ID) {
	$(ID).animate({
		top : DOWN
	}, animationTime, function(){
		$(ID).css('top', TOP);
		codeFlag = "";
	});
	
	if(ID == popDiv1) {
		$('#one_inp_1').val('');
	}
	else if(ID == popDiv2) {
		$('#two_inp_1').val('');
		$('#two_inp_2').val('');
	}
	else if(ID == popDiv3) {
		$('#thre_inp_1').val('');
		$('#thre_inp_2').val('');
		$('#thre_inp_3').val('');
	}
	else if(ID == popDiv4) {
		$('#for_inp_1').val('');
		$('#for_inp_2').val('');
		$('#for_inp_3').val('');
		$('#for_inp_4').val('');
	}
}

function addToInputPanel(str, n) {
	var arr = [bodyName, solnName, opt1Name, opt2Name, opt3Name, opt4Name];
	if(focusedPanel < 1 || focusedPanel > arr.length) return;
	var input = arr[focusedPanel - 1];
	var position = $(input).getCursorPosition();
	var content = $(input).val();
	var newContent = content.substr(0, position) + ' ' + str + ' ' + content.substr(position);
	$(input).val(newContent);
	var len = str.length;
	if(n == 1) len = (len + 2) / 2;
	else if(!n) len = len + 2;
	else len = 1 + n;
	$(input).selectRange(position + len);
}