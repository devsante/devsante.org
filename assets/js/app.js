function search_func(t){""!==t.state.query&&(search_mode("on"),t.search())}function search_mode(t){var e=document.getElementById("search-hits"),n=document.getElementsByTagName("body")[0],i=document.querySelectorAll("#search .search-cancel")[0],a="search";"on"==t?(n.classList.contains(a)||n.classList.add(a),e.style.display="",i.style.display="block"):(n.classList.contains(a)&&n.classList.remove(a),e.style.display="none",i.style.display="none")}function clear_search(t){t.preventDefault();var e=document.querySelectorAll("#search .ais-search-box--input")[0];e.value="",search_mode("off")}function get_locale_date_string_fallback(t){if("undefined"!=typeof t){var e=new Date(t);if(date_string=e.toLocaleDateString(),!date_string){var n=e.getDate(),i=e.getMonth()+1,a=e.getFullYear();date_string=n+"/"+i+"/"+a}}else date_string="";return date_string}"document"in self&&("classList"in document.createElement("_")&&(!document.createElementNS||"classList"in document.createElementNS("http://www.w3.org/2000/svg","g"))?!function(){"use strict";var t=document.createElement("_");if(t.classList.add("c1","c2"),!t.classList.contains("c2")){var e=function(t){var e=DOMTokenList.prototype[t];DOMTokenList.prototype[t]=function(t){var n,i=arguments.length;for(n=0;n<i;n++)t=arguments[n],e.call(this,t)}};e("add"),e("remove")}if(t.classList.toggle("c3",!1),t.classList.contains("c3")){var n=DOMTokenList.prototype.toggle;DOMTokenList.prototype.toggle=function(t,e){return 1 in arguments&&!this.contains(t)==!e?e:n.call(this,t)}}t=null}():!function(t){"use strict";if("Element"in t){var e="classList",n="prototype",i=t.Element[n],a=Object,r=String[n].trim||function(){return this.replace(/^\s+|\s+$/g,"")},s=Array[n].indexOf||function(t){for(var e=0,n=this.length;e<n;e++)if(e in this&&this[e]===t)return e;return-1},o=function(t,e){this.name=t,this.code=DOMException[t],this.message=e},c=function(t,e){if(""===e)throw new o("SYNTAX_ERR","An invalid or illegal string was specified");if(/\s/.test(e))throw new o("INVALID_CHARACTER_ERR","String contains an invalid character");return s.call(t,e)},l=function(t){for(var e=r.call(t.getAttribute("class")||""),n=e?e.split(/\s+/):[],i=0,a=n.length;i<a;i++)this.push(n[i]);this._updateClassName=function(){t.setAttribute("class",this.toString())}},u=l[n]=[],h=function(){return new l(this)};if(o[n]=Error[n],u.item=function(t){return this[t]||null},u.contains=function(t){return t+="",c(this,t)!==-1},u.add=function(){var t,e=arguments,n=0,i=e.length,a=!1;do t=e[n]+"",c(this,t)===-1&&(this.push(t),a=!0);while(++n<i);a&&this._updateClassName()},u.remove=function(){var t,e,n=arguments,i=0,a=n.length,r=!1;do for(t=n[i]+"",e=c(this,t);e!==-1;)this.splice(e,1),r=!0,e=c(this,t);while(++i<a);r&&this._updateClassName()},u.toggle=function(t,e){t+="";var n=this.contains(t),i=n?e!==!0&&"remove":e!==!1&&"add";return i&&this[i](t),e===!0||e===!1?e:!n},u.toString=function(){return this.join(" ")},a.defineProperty){var f={get:h,enumerable:!0,configurable:!0};try{a.defineProperty(i,e,f)}catch(t){t.number===-2146823252&&(f.enumerable=!1,a.defineProperty(i,e,f))}}else a[n].__defineGetter__&&i.__defineGetter__(e,h)}}(self)),function(){function t(){}function e(t,e,i){function a(e){var n=m,i=_;return m=_=s,O=e,y=t.apply(i,n)}function c(t){return O=t,b=setTimeout(h,e),R?a(t):y}function l(t){var n=t-w,i=t-O,a=e-n;return E?x(a,v-i):a}function u(t){var n=t-w,i=t-O;return w===s||n>=e||n<0||E&&i>=v}function h(){var t=j();return u(t)?f(t):(b=setTimeout(h,l(t)),s)}function f(t){return b=s,S&&m?a(t):(m=_=s,y)}function d(){b!==s&&clearTimeout(b),O=0,m=w=_=b=s}function g(){return b===s?y:f(j())}function p(){var t=j(),n=u(t);if(m=arguments,_=this,w=t,n){if(b===s)return c(w);if(E)return b=setTimeout(h,e),a(w)}return b===s&&(b=setTimeout(h,e)),y}var m,_,v,y,b,w,O=0,R=!1,E=!1,S=!0;if("function"!=typeof t)throw new TypeError(o);return e=r(e)||0,n(i)&&(R=!!i.leading,E="maxWait"in i,v=E?L(r(i.maxWait)||0,e):v,S="trailing"in i?!!i.trailing:S),p.cancel=d,p.flush=g,p}function n(t){var e=typeof t;return null!=t&&("object"==e||"function"==e)}function i(t){return null!=t&&"object"==typeof t}function a(t){return"symbol"==typeof t||i(t)&&w.call(t)==l}function r(t){if("number"==typeof t)return t;if(a(t))return c;if(n(t)){var e="function"==typeof t.valueOf?t.valueOf():t;t=n(e)?e+"":e}if("string"!=typeof t)return 0===t?t:+t;t=t.replace(u,"");var i=f.test(t);return i||d.test(t)?g(t.slice(2),i?2:8):h.test(t)?c:+t}var s,o="Expected a function",c=NaN,l="[object Symbol]",u=/^\s+|\s+$/g,h=/^[-+]0x[0-9a-f]+$/i,f=/^0b[01]+$/i,d=/^0o[0-7]+$/i,g=parseInt,p="object"==typeof global&&global&&global.Object===Object&&global,m="object"==typeof self&&self&&self.Object===Object&&self,_=p||m||Function("return this")(),v="object"==typeof exports&&exports&&!exports.nodeType&&exports,y=v&&"object"==typeof module&&module&&!module.nodeType&&module,b=Object.prototype,w=b.toString,L=Math.max,x=Math.min,j=function(){return _.Date.now()};t.debounce=e,t.isObject=n,t.isObjectLike=i,t.isSymbol=a,t.now=j,t.toNumber=r,t.VERSION="4.16.4","function"==typeof define&&"object"==typeof define.amd&&define.amd?(_._=t,define(function(){return t})):y?((y.exports=t)._=t,v._=t):_._=t}.call(this);var search=instantsearch({appId:algolia_appId,apiKey:algolia_apiKey,indexName:algolia_indexName,urlSync:!0,searchFunction:_.debounce(search_func,200),searchParameters:{distinct:2}});search.addWidget(instantsearch.widgets.searchBox({container:"#search .search-input",placeholder:"votre recherche"})),search.addWidget(instantsearch.widgets.hits({container:"#search-hits .content",transformData:{item:function(t){return t.datetime=get_locale_date_string_fallback(1e3*t.datetime),0!==t._distinctSeqID&&(delete t._highlightResult.title,delete t.author,delete t.datetime),t}},templates:{item:'<article>{{#_highlightResult.title}}<h1><a href="/{{_id}}">{{{_highlightResult.title.value}}}</a></h1>{{/_highlightResult.title}}{{#datetime}}<div class="date">{{datetime}}</div>{{/datetime}}{{#author}}<div class="author">{{author}}</div>{{/author}}{{#_highlightResult._heading.value}}<div class="heading"><a href="/{{_id}}">{{{_highlightResult._heading.value}}}</a></div>{{/_highlightResult._heading.value}}{{#_snippetResult._content.value}}<div class="text"><a href="/{{_id}}">[...] {{{_snippetResult._content.value}}} [...] </a></div>{{/_snippetResult._content.value}}</article>',empty:"Votre recherche n' a retourné aucun résultat"},hitsPerPage:5})),search.addWidget(instantsearch.widgets.pagination({container:"#search-pagination",maxPages:20,showFirstLast:!1,padding:2})),search.start();