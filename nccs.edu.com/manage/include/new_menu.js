var MOL=new Array(); 
function MenuObj(_A,_B,_C,_D,_E,_F,_G,_H,_I)
{
this.name=_A;
this.bOn=_E;
this.bOf=_F;
this.bA=_G;
this.SBS=SBS;
this.showing=false;
this.TM=TM;
document.onclick=MCH;
this.Direction=_I;
MOL[MOL.length]=this;
this.divObj=eval('document.all.' + _B);
this.divStyleObj=eval('document.all.' + _B + '.style');
this.refTDObj=eval('document.all.' + _C);
if (_D)
this.DdTDObj=eval('document.all.' +  _D);
this.frmObj=eval('document.all.' +  _H);
this.strShow='visible';
this.strHide='hidden';
}
function ROP(ObjRef)
{
var theObj=null;
if (ObjRef)
{
if (typeof ObjRef != 'object')
theObj=eval(ObjRef);
else
theObj=ObjRef;
return theObj;
}
else
return false;
}
function TM()
{
if (!this.showing)
{
var RelObjCords=getXY(this.refTDObj);
if (this.Direction)
{
this.divStyleObj.top =  RelObjCords.top + -this.divObj.offsetHeight;
this.divStyleObj.left =  RelObjCords.left;
}
else
{
this.divStyleObj.top =  RelObjCords.top + 18;
this.divStyleObj.left =  RelObjCords.left;
}
var pCurrMenuObj=ROP(this);
CM(this);
this.SBS('clicked');
this.divStyleObj.visibility =  this.strShow;
this.showing=true;
}
else
{
this.divStyleObj.visibility =  this.strHide;
this.showing=false;
this.SBS();
}
}
function CM(callerObj)
{
for (aIndex=0;aIndex < MOL.length; aIndex++)
{
if ((callerObj) && (callerObj.name != MOL[aIndex].name))
{	
if (MOL[aIndex].showing)
{
MOL[aIndex].TM();
MOL[aIndex].SBS();
}
}
else
{
if (MOL[aIndex].showing)
{
MOL[aIndex].TM();
MOL[aIndex].SBS();
}
}
}
}
function MCH(e, srcObj, srcIsMenuDiv)
{
var srcElem;
if (!e)
var e=window.event;
e.cancelBubble=true;
if (srcObj)
{
var pCurrMenuObj=ROP(srcObj); 
if (!srcIsMenuDiv)
pCurrMenuObj.divObj.onclick="MCH(event,"+srcObj+",true)";
pCurrMenuObj.TM();
}
else
CM();
}
function MME(e, srcObj)
{
try
{
if (!e) 
var e=window.event;
var pCurrMenuObj=ROP(srcObj);
if (!pCurrMenuObj.showing)
{
if (e.type == 'mouseover')
pCurrMenuObj.SBS('on');
else if ((e.type == 'mouseout') || (e.type == 'blur'))
pCurrMenuObj.SBS();
}
}
catch(e){}
}
function SBS(wS)
{
if (typeof this.refTDObj != "undefined")
{
if (wS == 'on')
{
if (this.bOn)
{
if (typeof this.DdTDObj != "undefined")
this.DdTDObj.className=this.bOn;
this.refTDObj.className=this.bOn;
}
}
else if (wS == 'clicked')
{
if (this.bA)
{
if (typeof this.DdTDObj != "undefined")
this.DdTDObj.className=this.bA;
this.refTDObj.className=this.bA;
}
}
else
{
if (this.bOf)
{
if (typeof this.DdTDObj != "undefined")
this.DdTDObj.className=this.bOf;
this.refTDObj.className=this.bOf;
}
}
}
}
function getXY(Obj) 
{
for (var sumTop=3,sumLeft=12;Obj!=document.body;sumTop+=Obj.offsetTop,sumLeft+=Obj.offsetLeft, Obj=Obj.offsetParent);
return {left:sumLeft,top:sumTop}
}
function MO(e)
{
if (!e)
var e=window.event;
var S=e.srcElement;
while (S.tagName!="TD")
{S=S.parentElement;}
S.className="T";
}
function MU(e)
{
if (!e)
var e=window.event;
var S=e.srcElement;
while (S.tagName!="TD")
{S=S.parentElement;}
S.className="P";
}
function MOD(e)
{
if (!e)
var e=window.event;
var S=e.srcElement;
while (S.tagName!="TD")
{S=S.parentElement;}
S.className="S";
}
function MUD(e)
{
if (!e)
var e=window.event;
var S=e.srcElement;
while (S.tagName!="TD")
{S=S.parentElement;}
S.className="R";
}
function MO_D(e)
{
if (!e)
var e=window.event;
var S=e.srcElement;
while (S.tagName!="TD")
{S=S.parentElement;}
S.className="X";
}
function MU_D(e)
{
if (!e)
var e=window.event;
var S=e.srcElement;
while (S.tagName!="TD")
{S=S.parentElement;}
S.className="W";
}
function G(UR)
{
if (!e)
var e=window.event;
if (e)
e.cancelBubble=true;
if(UR)
location.href=UR;
}