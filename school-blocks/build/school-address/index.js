(()=>{"use strict";var o,e={182:()=>{const o=window.wp.blocks,e=window.wp.i18n,s=window.wp.blockEditor,r=window.wp.coreData,n=window.wp.components,t=window.ReactJSXRuntime,l=JSON.parse('{"UU":"school-blocks/school-address"}');(0,o.registerBlockType)(l.UU,{edit:function({attributes:o,setAttributes:l}){const[c,i]=(0,r.useEntityProp)("postType","page","meta",64),{school_address:a}=c,{svgIcon:h}=o;return(0,t.jsxs)(t.Fragment,{children:[(0,t.jsxs)("address",{...(0,s.useBlockProps)(),children:[h&&(0,t.jsx)("svg",{xmlns:"http://www.w3.org/2000/svg",width:"24",height:"24",viewBox:"0 0 24 24",role:"img","aria-label":"Location Icon",children:(0,t.jsx)("path",{d:"M12 0c-3.148 0-6 2.553-6 5.702 0 3.148 2.602 6.907 6 12.298 3.398-5.391 6-9.15 6-12.298 0-3.149-2.851-5.702-6-5.702zm0 8c-1.105 0-2-.895-2-2s.895-2 2-2 2 .895 2 2-.895 2-2 2zm4 14.5c0 .828-1.79 1.5-4 1.5s-4-.672-4-1.5 1.79-1.5 4-1.5 4 .672 4 1.5z"})}),(0,t.jsx)(s.RichText,{placeholder:(0,e.__)("Enter address here...","school-blocks"),tagName:"p",value:a,onChange:o=>{return e="school_address",s=o,void i({...c,[e]:s});var e,s}})]}),(0,t.jsx)(s.InspectorControls,{children:(0,t.jsx)(n.PanelBody,{title:(0,e.__)("Settings","school-blocks"),children:(0,t.jsx)(n.PanelRow,{children:(0,t.jsx)(n.ToggleControl,{label:(0,e.__)("Show SVG Icon","school-blocks"),checked:h,onChange:o=>l({svgIcon:o}),help:(0,e.__)("Display an SVG icon next to the address.","school-blocks")})})})})]})}})}},s={};function r(o){var n=s[o];if(void 0!==n)return n.exports;var t=s[o]={exports:{}};return e[o](t,t.exports,r),t.exports}r.m=e,o=[],r.O=(e,s,n,t)=>{if(!s){var l=1/0;for(h=0;h<o.length;h++){for(var[s,n,t]=o[h],c=!0,i=0;i<s.length;i++)(!1&t||l>=t)&&Object.keys(r.O).every((o=>r.O[o](s[i])))?s.splice(i--,1):(c=!1,t<l&&(l=t));if(c){o.splice(h--,1);var a=n();void 0!==a&&(e=a)}}return e}t=t||0;for(var h=o.length;h>0&&o[h-1][2]>t;h--)o[h]=o[h-1];o[h]=[s,n,t]},r.o=(o,e)=>Object.prototype.hasOwnProperty.call(o,e),(()=>{var o={5:0,529:0};r.O.j=e=>0===o[e];var e=(e,s)=>{var n,t,[l,c,i]=s,a=0;if(l.some((e=>0!==o[e]))){for(n in c)r.o(c,n)&&(r.m[n]=c[n]);if(i)var h=i(r)}for(e&&e(s);a<l.length;a++)t=l[a],r.o(o,t)&&o[t]&&o[t][0](),o[t]=0;return r.O(h)},s=globalThis.webpackChunkschool_blocks=globalThis.webpackChunkschool_blocks||[];s.forEach(e.bind(null,0)),s.push=e.bind(null,s.push.bind(s))})();var n=r.O(void 0,[529],(()=>r(182)));n=r.O(n)})();