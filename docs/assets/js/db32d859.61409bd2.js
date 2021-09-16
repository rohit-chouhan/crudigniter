"use strict";(self.webpackChunkmy_website=self.webpackChunkmy_website||[]).push([[653],{3905:function(e,t,n){n.d(t,{Zo:function(){return c},kt:function(){return m}});var r=n(7294);function o(e,t,n){return t in e?Object.defineProperty(e,t,{value:n,enumerable:!0,configurable:!0,writable:!0}):e[t]=n,e}function a(e,t){var n=Object.keys(e);if(Object.getOwnPropertySymbols){var r=Object.getOwnPropertySymbols(e);t&&(r=r.filter((function(t){return Object.getOwnPropertyDescriptor(e,t).enumerable}))),n.push.apply(n,r)}return n}function i(e){for(var t=1;t<arguments.length;t++){var n=null!=arguments[t]?arguments[t]:{};t%2?a(Object(n),!0).forEach((function(t){o(e,t,n[t])})):Object.getOwnPropertyDescriptors?Object.defineProperties(e,Object.getOwnPropertyDescriptors(n)):a(Object(n)).forEach((function(t){Object.defineProperty(e,t,Object.getOwnPropertyDescriptor(n,t))}))}return e}function l(e,t){if(null==e)return{};var n,r,o=function(e,t){if(null==e)return{};var n,r,o={},a=Object.keys(e);for(r=0;r<a.length;r++)n=a[r],t.indexOf(n)>=0||(o[n]=e[n]);return o}(e,t);if(Object.getOwnPropertySymbols){var a=Object.getOwnPropertySymbols(e);for(r=0;r<a.length;r++)n=a[r],t.indexOf(n)>=0||Object.prototype.propertyIsEnumerable.call(e,n)&&(o[n]=e[n])}return o}var u=r.createContext({}),p=function(e){var t=r.useContext(u),n=t;return e&&(n="function"==typeof e?e(t):i(i({},t),e)),n},c=function(e){var t=p(e.components);return r.createElement(u.Provider,{value:t},e.children)},s={inlineCode:"code",wrapper:function(e){var t=e.children;return r.createElement(r.Fragment,{},t)}},d=r.forwardRef((function(e,t){var n=e.components,o=e.mdxType,a=e.originalType,u=e.parentName,c=l(e,["components","mdxType","originalType","parentName"]),d=p(n),m=o,k=d["".concat(u,".").concat(m)]||d[m]||s[m]||a;return n?r.createElement(k,i(i({ref:t},c),{},{components:n})):r.createElement(k,i({ref:t},c))}));function m(e,t){var n=arguments,o=t&&t.mdxType;if("string"==typeof e||o){var a=n.length,i=new Array(a);i[0]=d;var l={};for(var u in t)hasOwnProperty.call(t,u)&&(l[u]=t[u]);l.originalType=e,l.mdxType="string"==typeof e?e:o,i[1]=l;for(var p=2;p<a;p++)i[p]=n[p];return r.createElement.apply(null,i)}return r.createElement.apply(null,n)}d.displayName="MDXCreateElement"},7215:function(e,t,n){n.r(t),n.d(t,{frontMatter:function(){return l},contentTitle:function(){return u},metadata:function(){return p},toc:function(){return c},default:function(){return d}});var r=n(7462),o=n(3366),a=(n(7294),n(3905)),i=["components"],l={sidebar_position:2},u=void 0,p={unversionedId:"security",id:"security",isDocsHomePage:!1,title:"security",description:"Security added for all methods, in before its just accessing and performing CRUD technique without any key and authorization. But now we added authorization (bearer token) for CRUD. Its a optional feature. If you want to enable security it wil always need authorization else nothing. Follow the below introduction to use.",source:"@site/docs/security.md",sourceDirName:".",slug:"/security",permalink:"/crudigniter/docs/security",editUrl:"https://github.com/rohit-chouhan/crudigniter/docs/security.md",tags:[],version:"current",sidebarPosition:2,frontMatter:{sidebar_position:2},sidebar:"tutorialSidebar",previous:{title:"Intro",permalink:"/crudigniter/docs/Intro"},next:{title:"create",permalink:"/crudigniter/docs/methods/create"}},c=[{value:"SECURITY_CONFIG",id:"security_config",children:[{value:"example",id:"example",children:[]}]},{value:"TOKEN_KEY",id:"token_key",children:[{value:"example",id:"example-1",children:[]}]}],s={toc:c};function d(e){var t=e.components,n=(0,o.Z)(e,i);return(0,a.kt)("wrapper",(0,r.Z)({},s,n,{components:t,mdxType:"MDXLayout"}),(0,a.kt)("p",null,"Security added for all methods, in before its just accessing and performing CRUD technique without any key and authorization. But now we added authorization (",(0,a.kt)("inlineCode",{parentName:"p"},"bearer token"),") for CRUD. Its a optional feature. If you want to enable security it wil always need authorization else nothing. Follow the below introduction to use."),(0,a.kt)("p",null,"In ",(0,a.kt)("inlineCode",{parentName:"p"},"roor/.env")," file we added two more varibale ",(0,a.kt)("inlineCode",{parentName:"p"},"SECURITY_CONFIG")," and ",(0,a.kt)("inlineCode",{parentName:"p"},"TOKEN_KEY"),"."),(0,a.kt)("h2",{id:"security_config"},"SECURITY_CONFIG"),(0,a.kt)("p",null,"Its contain true and false values, if you want to enable so use ",(0,a.kt)("inlineCode",{parentName:"p"},"1"),", for nothing use ",(0,a.kt)("inlineCode",{parentName:"p"},"0")),(0,a.kt)("h3",{id:"example"},"example"),(0,a.kt)("p",null,"To enable authorization use ",(0,a.kt)("inlineCode",{parentName:"p"},"1")),(0,a.kt)("pre",null,(0,a.kt)("code",{parentName:"pre"},"SECURITY_CONFIG = 1\n")),(0,a.kt)("p",null,"for normal use (without authorization), try ",(0,a.kt)("inlineCode",{parentName:"p"},"0")),(0,a.kt)("pre",null,(0,a.kt)("code",{parentName:"pre"},"SECURITY_CONFIG = 0\n")),(0,a.kt)("h2",{id:"token_key"},"TOKEN_KEY"),(0,a.kt)("p",null,"There you have to give a token key for autorization if ",(0,a.kt)("inlineCode",{parentName:"p"},"SECURITY_CONFIG")," is true, while requesting method ",(0,a.kt)("inlineCode",{parentName:"p"},"bearer token")," will compare with ",(0,a.kt)("inlineCode",{parentName:"p"},"TOKEN_KEY")),(0,a.kt)("h3",{id:"example-1"},"example"),(0,a.kt)("pre",null,(0,a.kt)("code",{parentName:"pre"},'TOKEN_KEY = "ABC123"\n')),(0,a.kt)("h1",{id:"how-it-will-work"},"How it will work?"),(0,a.kt)("p",null,"If ",(0,a.kt)("inlineCode",{parentName:"p"},"SECURITY_CONFIG = 1"),", it will always take ",(0,a.kt)("inlineCode",{parentName:"p"},"bearer token")," with reqeuste, ",(0,a.kt)("inlineCode",{parentName:"p"},"bearer token")," will be your ",(0,a.kt)("inlineCode",{parentName:"p"},"TOKEN_KEY")),(0,a.kt)("pre",null,(0,a.kt)("code",{parentName:"pre"},"GET | example.com/users\n")),(0,a.kt)("blockquote",null,(0,a.kt)("p",{parentName:"blockquote"},'header("Authorization: bearer ABC123")')),(0,a.kt)("p",null,"response"),(0,a.kt)("pre",null,(0,a.kt)("code",{parentName:"pre",className:"language-json"},'[\n  {\n    "id": "1",\n    "name": "Rohit",\n    "email": "rohit@gmail.com",\n    "password": "Rohit321"\n  }\n]\n')),(0,a.kt)("p",null,"if you not pass ",(0,a.kt)("inlineCode",{parentName:"p"},"bearer")," as autorization or wrong key, it will reponse"),(0,a.kt)("pre",null,(0,a.kt)("code",{parentName:"pre",className:"language-json"},'{\n  "status":false,\n  "message":"Failed to auth, token is invalid"\n}\n')),(0,a.kt)("p",null,"If ",(0,a.kt)("inlineCode",{parentName:"p"},"SECURITY_CONFIG = 0"),", it will work normally."),(0,a.kt)("pre",null,(0,a.kt)("code",{parentName:"pre"},"GET | example.com/users\n")),(0,a.kt)("p",null,"response"),(0,a.kt)("pre",null,(0,a.kt)("code",{parentName:"pre",className:"language-json"},'[\n  {\n    "id": "1",\n    "name": "Rohit",\n    "email": "rohit@gmail.com",\n    "password": "Rohit321"\n  }\n]\n')))}d.isMDXComponent=!0}}]);