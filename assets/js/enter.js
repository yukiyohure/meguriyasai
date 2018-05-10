(function($){
	$.fn.jqKey = function(options){
		window.onhelp=function(){return false;}
		var defaults = {
			"Enter":false
			,"Tab":false
			,"F1":null
			,"F2":null
			,"F3":null
			,"F4":null
			,"F5":null
			,"F6":null
			,"F7":null
			,"F8":null
			,"F9":null
			,"F10":null
			,"F11":null
			,"F12":null
			,"ESC":null
		};
		var setting = $.extend(defaults,options);
		var method = function(e){

			var Focus_Move = function(df,shift){
				//フォームオブジェクトが何番目か探す
				var ln = df.length;
				var i;
				for (i=0;i<ln;i++){
					if (df[i]==obj) break;
				}
				//フォーカスを取得できないものは飛ばします
				var mv = (shift?-1:1);
				var j = (ln+i+mv) % ln;
				var Fo,Fs;
				while(true){

					Fo	=	df[j];
					Fs	=	Fo.style;
					if	(Fo.type!="hidden" &&
						Fo.style.visibility!="hidden" &&
						!Fo.disabled &&
						Fo.tabIndex!=-1 &&
						Fs.visibility!="hidden" &&
						Fs.display!="none"){
						//対象のオブジェクトを戻す
						return Fo;
					}
					j=(j+mv+ln) % ln;
				}
				//Hitしない場合
				return df[i];
			}
			var df = document.forms[0];
			var	k	=	e.keyCode;
			var	s	=	e.shiftKey;
			var	c	=	e.ctrlKey;
			var	a	=	e.altKey;
			var	obj	=	e.target;
			var blKey	=	true;
			if (!setting.Enter&&k==13) return true;
			if (!setting.Tab&&k==9) return true;
			switch(k){
				case 13:
					switch(obj.type){
					case"button":
					case"file":case"textarea":
						blKey = true;
						break;
					case"radio":case"checkbox":
//						setTimeout(function(){obj.click();},1)
//						blKey = true;
//						break;
					case"text":case"select-one":case"select-multiple":
						blKey = false;
						break;
					default:
						blKey = false;
						break;
					}
					//keyイベントを処理するもののみ抽出
					if (!blKey){
						//次のフォームオブジェクト探す
						obj = Focus_Move(df,s);
					}
				break;
				case 9:		//tab
					switch(obj.type){
					case"file":
						blKey = true;
						break;
					default:
						//次のフォームオブジェクト探す
						obj = Focus_Move(df,s);
						blKey = false;
						break;
					}

				break;
				break;
				case 27://ESC
					if(setting.ESC){
						setting.ESC();
						blKey = false;
					}
				break;
				default:
					if(k>=112&&k<=123){
						var F = setting["F"+(k-111)];
						if(F)F(obj,s,c,a);
						blKey = false;
					}
				break;
			}
			if(!blKey){
				//イベントを伝播しない
				//IE規定の動作キャンセル
				if(document.all) window.event.keyCode = 0;
				obj.focus();
				if(obj.select&&obj.type!="button") obj.select();
			}
			return blKey;
		};

        this.each(function() {
			$(this).keydown(function(e){
				var ret =method(e);
				return ret;
			});
		});
	}
})(jQuery);
$(document).jqKey(
{
	Enter:true               //Enterで次項目移動する
	,Tab:true                //Tabで次項目移動する
	,F1:function(object,shiftKey,ctrlKey,altKey)
	{alert("push F1 key\n shift:"+shiftKey+"\nctrl:"+ctrlKey+"\n:alt:"+altKey);}
	//F1キー押下時の関数登録
	,ESC:function(){alert("push ESC key");}//ESCキー押下時の関数登録
});