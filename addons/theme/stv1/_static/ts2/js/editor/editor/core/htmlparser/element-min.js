KISSY.Editor.add("htmlparser-element",function(){function k(d,c){this.name=d;this.attributes=c||(c={});this.children=[];var b=c._ke_real_element_type||d,a=g.XHTML_DTD;b=!!(a.$nonBodyContent[b]||a.$block[b]||a.$listItem[b]||a.$tableContent[b]||a.$nonEditable[b]||b=="br");var e=!!a.$empty[d];this.isEmpty=e;this.isUnknown=!a[d];this._={isBlockLike:b,hasInlineStarted:e||!b}}var g=KISSY.Editor,o=g.NODE,q=function(d,c){d=d[0];c=c[0];return d<c?-1:d>c?1:0};KISSY.augment(k,{type:o.NODE_ELEMENT,add:g.HtmlParser.Fragment.prototype.add,
clone:function(){return new k(this.name,this.attributes)},writeHtml:function(d,c){var b=this.attributes,a=this,e=a.name,f,h,l,m;a.filterChildren=function(){if(!m){var p=new g.HtmlParser.BasicWriter;g.HtmlParser.Fragment.prototype.writeChildrenHtml.call(a,p,c);a.children=(new g.HtmlParser.Fragment.FromHtml(p.getHtml())).children;m=1}};a.filterChildren=a.filterChildren;if(c){for(;;){if(!(e=c.onElementName(e)))return;a.name=e;if(!(a=c.onElement(a)))return;a.parent=this.parent;if(a.name==e)break;if(a.type!=
o.NODE_ELEMENT){a.writeHtml(d,c);return}e=a.name;if(!e){this.writeChildrenHtml.call(a,d,m?null:c);return}}b=a.attributes}d.openTag(e,b);for(var n=[],i=0;i<2;i++)for(f in b){h=f;l=b[f];if(i==1)n.push([f,l]);else if(c){for(;;)if(h=c.onAttributeName(f))if(h!=f){delete b[f];f=h}else break;else{delete b[f];break}if(h)if((l=c.onAttribute(a,h,l))===false)delete b[h];else b[h]=l}}d.sortAttributes&&n.sort(q);b=n.length;for(i=0;i<b;i++){f=n[i];d.attribute(f[0],f[1])}d.openTagClose(e,a.isEmpty);if(!a.isEmpty){this.writeChildrenHtml.call(a,
d,m?null:c);d.closeTag(e)}},writeChildrenHtml:function(){g.HtmlParser.Fragment.prototype.writeChildrenHtml.apply(this,arguments)}});g.HtmlParser.Element=k;g.HtmlParser.Element=k;var j=k.prototype;g.Utils.extern(j,{type:j.type,add:j.add,clone:j.clone,writeHtml:j.writeHtml,writeChildrenHtml:j.writeChildrenHtml})});
