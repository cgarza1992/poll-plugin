!function(){"use strict";var n,e={227:function(){var n=window.wp.blocks,e=window.wp.element,r=window.wp.i18n,o=window.wp.blockEditor,t=JSON.parse('{"u2":"create-block/poll-plugin"}');(0,n.registerBlockType)(t.u2,{edit:function(){return(0,e.createElement)("p",(0,o.useBlockProps)(),(0,r.__)("Poll Plugin – hello from the editor!","poll-plugin"))},save:function(){return(0,e.createElement)("p",o.useBlockProps.save(),"Poll Plugin – hello from the saved content!")}})}},r={};function o(n){var t=r[n];if(void 0!==t)return t.exports;var l=r[n]={exports:{}};return e[n](l,l.exports,o),l.exports}o.m=e,n=[],o.O=function(e,r,t,l){if(!r){var i=1/0;for(f=0;f<n.length;f++){r=n[f][0],t=n[f][1],l=n[f][2];for(var u=!0,c=0;c<r.length;c++)(!1&l||i>=l)&&Object.keys(o.O).every((function(n){return o.O[n](r[c])}))?r.splice(c--,1):(u=!1,l<i&&(i=l));if(u){n.splice(f--,1);var p=t();void 0!==p&&(e=p)}}return e}l=l||0;for(var f=n.length;f>0&&n[f-1][2]>l;f--)n[f]=n[f-1];n[f]=[r,t,l]},o.o=function(n,e){return Object.prototype.hasOwnProperty.call(n,e)},function(){var n={826:0,431:0};o.O.j=function(e){return 0===n[e]};var e=function(e,r){var t,l,i=r[0],u=r[1],c=r[2],p=0;if(i.some((function(e){return 0!==n[e]}))){for(t in u)o.o(u,t)&&(o.m[t]=u[t]);if(c)var f=c(o)}for(e&&e(r);p<i.length;p++)l=i[p],o.o(n,l)&&n[l]&&n[l][0](),n[l]=0;return o.O(f)},r=self.webpackChunkpoll_plugin=self.webpackChunkpoll_plugin||[];r.forEach(e.bind(null,0)),r.push=e.bind(null,r.push.bind(r))}();var t=o.O(void 0,[431],(function(){return o(227)}));t=o.O(t)}();