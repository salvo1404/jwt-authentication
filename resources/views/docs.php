<!DOCTYPE html><html><head><meta charset="utf-8"><title>JWT Auth</title><link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css"><style>@import url(http://fonts.googleapis.com/css?family=Roboto:400,700|Inconsolata|Raleway:200);.hljs-comment,.hljs-title{color:#8e908c}.hljs-variable,.hljs-attribute,.hljs-tag,.hljs-regexp,.ruby .hljs-constant,.xml .hljs-tag .hljs-title,.xml .hljs-pi,.xml .hljs-doctype,.html .hljs-doctype,.css .hljs-id,.css .hljs-class,.css .hljs-pseudo{color:#c82829}.hljs-number,.hljs-preprocessor,.hljs-pragma,.hljs-built_in,.hljs-literal,.hljs-params,.hljs-constant{color:#f5871f}.ruby .hljs-class .hljs-title,.css .hljs-rules .hljs-attribute{color:#eab700}.hljs-string,.hljs-value,.hljs-inheritance,.hljs-header,.ruby .hljs-symbol,.xml .hljs-cdata{color:#718c00}.css .hljs-hexcolor{color:#3e999f}.hljs-function,.python .hljs-decorator,.python .hljs-title,.ruby .hljs-function .hljs-title,.ruby .hljs-title .hljs-keyword,.perl .hljs-sub,.javascript .hljs-title,.coffeescript .hljs-title{color:#4271ae}.hljs-keyword,.javascript .hljs-function{color:#8959a8}.hljs{display:block;background:white;color:#4d4d4c;padding:.5em}.coffeescript .javascript,.javascript .xml,.tex .hljs-formula,.xml .javascript,.xml .vbscript,.xml .css,.xml .hljs-cdata{opacity:.5}body{color:black;background:white;font-family:'Roboto',Helvetica,sans-serif;font-size:14px;line-height:1.42}header{border-bottom:1px solid #f2f2f2;margin-bottom:12px}h1,h2,h3,h4,h5{color:black;margin:12px 0}h1 .permalink,h2 .permalink,h3 .permalink,h4 .permalink,h5 .permalink{margin-left:6px;opacity:0;transition:opacity .25s ease}h1:hover .permalink,h2:hover .permalink,h3:hover .permalink,h4:hover .permalink,h5:hover .permalink{opacity:1}h1{font-family:'Raleway',Helvetica,sans-serif;font-size:36px;font-weight:500}h2{font-family:'Raleway',Helvetica,sans-serif;font-size:30px;font-weight:500}h3{font-size:100%;text-transform:uppercase}h5{font-size:100%;font-weight:normal}p{margin:0 0 10px}p.choices{line-height:1.6}a{color:#428bca;text-decoration:none}li p{margin:0}dl dt{float:left;width:160px;clear:left;text-align:right;overflow:hidden;text-overflow:ellipsis;white-space:nowrap;font-weight:700}dl dd{margin-left:180px}blockquote{color:rgba(0,0,0,0.5);font-size:15.5px;padding:10px 20px;margin:12px 0;border-left:5px solid #e8e8e8}blockquote p:last-child{margin-bottom:0}pre{background-color:#f5f5f5;padding:12px;border:1px solid #cfcfcf;border-radius:6px;overflow:auto}pre code{background-color:transparent;padding:0;border:none}code{color:#444;background-color:#f5f5f5;font-family:'Inconsolata',monospace;padding:1px 4px;border:1px solid #cfcfcf;border-radius:3px}ul,ol{padding-left:2em}table{border-collapse:collapse;border-spacing:0;margin-bottom:12px}table tr:nth-child(2n){background-color:#fafafa}table th,table td{padding:6px 12px;border:1px solid #d9d9d9}.note,.warning{padding:.3em 1em;margin:1em 0;border-radius:2px;font-size:90%}.note h1,.warning h1,.note h2,.warning h2,.note h3,.warning h3,.note h4,.warning h4,.note h5,.warning h5,.note h6,.warning h6{font-family:'Raleway',Helvetica,sans-serif;font-size:135%;font-weight:500}.note p,.warning p{margin:.5em 0}.note{color:black;background-color:#f0f6fb;border-left:4px solid #428bca}.note h1,.note h2,.note h3,.note h4,.note h5,.note h6{color:#428bca}.warning{color:black;background-color:#fbf1f0;border-left:4px solid #c9302c}.warning h1,.warning h2,.warning h3,.warning h4,.warning h5,.warning h6{color:#c9302c}nav{position:fixed;top:24px;bottom:0;overflow-y:auto}nav .resource-group{padding:0}nav .resource-group .heading{position:relative}nav .resource-group .heading .chevron{position:absolute;top:12px;right:12px;opacity:.5}nav .resource-group .heading a{display:block;color:black;opacity:.7;border-left:2px solid transparent;margin:0}nav .resource-group .heading a:hover{border-left:2px solid black}nav ul{list-style-type:none;padding-left:0}nav ul a{display:block;font-size:13px;color:rgba(0,0,0,0.7);padding:8px 12px;border-top:1px solid #d9d9d9;border-left:2px solid transparent;overflow:hidden;text-overflow:ellipsis;white-space:nowrap}nav ul a:hover{border-left:2px solid black}nav ul>li{margin:0}nav ul>li:first-child{margin-top:-12px}nav ul>li:last-child{margin-bottom:-12px}nav ul ul a{padding-left:24px}nav ul ul li{margin:0}nav ul ul li:first-child{margin-top:0}nav ul ul li:last-child{margin-bottom:0}nav>div>div>ul>li:first-child>a{border-top:none}.preload *{transition:none !important}.pull-left{float:left}.pull-right{float:right}.badge{display:inline-block;float:right;min-width:10px;min-height:14px;padding:3px 7px;font-size:12px;color:#000;background-color:#f2f2f2;border-radius:10px;margin-top:-2px;margin-bottom:-2px}.badge.get{color:#70bbe1;background-color:#d9edf7}.badge.head{color:#70bbe1;background-color:#d9edf7}.badge.options{color:#70bbe1;background-color:#d9edf7}.badge.put{color:#f0db70;background-color:#fcf8e3}.badge.patch{color:#f0db70;background-color:#fcf8e3}.badge.post{color:#93cd7c;background-color:#dff0d8}.badge.delete{color:#ce8383;background-color:#f2dede}.collapse-button{float:right}.collapse-button .close{display:none;color:#428bca;cursor:pointer}.collapse-button .open{color:#428bca;cursor:pointer}.collapse-button.show .close{display:inline}.collapse-button.show .open{display:none}.collapse-content{max-height:0;overflow:hidden;transition:max-height .3s ease-in-out}nav{width:220px}.container{max-width:940px;margin-left:auto;margin-right:auto}.container .row .content{margin-left:244px;width:696px}.container .row:after{content:'';display:block;clear:both}.container-fluid nav{width:22%}.container-fluid .row .content{margin-left:24%;width:76%}@media (max-width:1200px){nav{width:200px}.container{max-width:840px}.container .row .content{margin-left:224px;width:606px}}@media (max-width:992px){nav{width:170px}.container{max-width:720px}.container .row .content{margin-left:194px;width:526px}}@media (max-width:768px){nav{display:none}.container{width:95%;max-width:none}.container .row .content,.container-fluid .row .content{margin-left:auto;margin-right:auto;width:95%}}.back-to-top{position:fixed;z-index:1;bottom:0;right:24px;padding:4px 8px;color:rgba(0,0,0,0.5);background-color:#f2f2f2;text-decoration:none !important;border-top:1px solid #d9d9d9;border-left:1px solid #d9d9d9;border-right:1px solid #d9d9d9;border-top-left-radius:3px;border-top-right-radius:3px}.resource-group{padding:12px;margin-bottom:12px;background-color:white;border:1px solid #d9d9d9;border-radius:6px}.resource-group h2.group-heading,.resource-group .heading a{padding:12px;margin:-12px -12px 12px -12px;background-color:#f2f2f2;border-bottom:1px solid #d9d9d9;border-top-left-radius:6px;border-top-right-radius:6px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden}nav .resource-group .heading a{margin-bottom:0}nav .resource-group .collapse-content{padding:0}.action{margin-bottom:12px;padding:12px 12px 0 12px;overflow:hidden;border:1px solid transparent;border-radius:6px}.action h4.action-heading{padding:12px;margin:-12px -12px 12px -12px;border-bottom:1px solid transparent;border-top-left-radius:6px;border-top-right-radius:6px;white-space:nowrap;text-overflow:ellipsis;overflow:hidden}.action h4.action-heading .name{float:right;font-weight:normal}.action h4.action-heading .method{padding:6px 12px;margin-right:12px;border-radius:3px}.action h4.action-heading .method.get{color:#fff;background-color:#337ab7}.action h4.action-heading .method.head{color:#fff;background-color:#337ab7}.action h4.action-heading .method.options{color:#fff;background-color:#337ab7}.action h4.action-heading .method.put{color:#fff;background-color:#ed9c28}.action h4.action-heading .method.patch{color:#fff;background-color:#ed9c28}.action h4.action-heading .method.post{color:#fff;background-color:#5cb85c}.action h4.action-heading .method.delete{color:#fff;background-color:#d9534f}.action h4.action-heading code{color:#444;background-color:#f5f5f5;border-color:#cfcfcf;font-weight:normal}.action dl.inner{padding-bottom:2px}.action .title{border-bottom:1px solid white;margin:0 -12px -1px -12px;padding:12px}.action.get{border-color:#bce8f1}.action.get h4.action-heading{color:#337ab7;background:#d9edf7;border-bottom-color:#bce8f1}.action.head{border-color:#bce8f1}.action.head h4.action-heading{color:#337ab7;background:#d9edf7;border-bottom-color:#bce8f1}.action.options{border-color:#bce8f1}.action.options h4.action-heading{color:#337ab7;background:#d9edf7;border-bottom-color:#bce8f1}.action.post{border-color:#d6e9c6}.action.post h4.action-heading{color:#5cb85c;background:#dff0d8;border-bottom-color:#d6e9c6}.action.put{border-color:#faebcc}.action.put h4.action-heading{color:#ed9c28;background:#fcf8e3;border-bottom-color:#faebcc}.action.patch{border-color:#faebcc}.action.patch h4.action-heading{color:#ed9c28;background:#fcf8e3;border-bottom-color:#faebcc}.action.delete{border-color:#ebccd1}.action.delete h4.action-heading{color:#d9534f;background:#f2dede;border-bottom-color:#ebccd1}</style></head><body class="preload"><a href="#top" class="text-muted back-to-top"><i class="fa fa-toggle-up"></i>&nbsp;Back to top</a><div class="container"><div class="row"><nav><div class="resource-group"><div class="heading"><div class="chevron"><i class="open fa fa-angle-down"></i></div><a href="#jwt-auth-api">JWT Auth API</a></div><div class="collapse-content"><ul><li><a href="#jwt-auth-api-login-post"><span class="badge post"><i class="fa fa-plus"></i></span>Login</a></li><li><a href="#jwt-auth-api-logout-post"><span class="badge post"><i class="fa fa-plus"></i></span>Logout</a></li><li><a href="#jwt-auth-api-forgot-password-post"><span class="badge post"><i class="fa fa-plus"></i></span>Forgot password</a></li><li><a href="#jwt-auth-api-activate-new-user-post"><span class="badge post"><i class="fa fa-plus"></i></span>Activate new user</a></li><li><a href="#jwt-auth-api-resend-activation-code-post"><span class="badge post"><i class="fa fa-plus"></i></span>Resend Activation Code</a></li><li><a href="#jwt-auth-api-users">Users</a><ul><li><a href="#jwt-auth-api-users-post"><span class="badge post"><i class="fa fa-plus"></i></span>Register a new user</a></li><li><a href="#jwt-auth-api-users-put"><span class="badge put"><i class="fa fa-pencil"></i></span>Update user</a></li><li><a href="#jwt-auth-api-users-get"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Get user profile</a></li><li><a href="#jwt-auth-api-users-get-1"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Get other user's profile</a></li></ul></li><li><a href="#jwt-auth-api-status-get"><span class="badge get"><i class="fa fa-arrow-down"></i></span>Check Status</a></li></ul></div></div><p style="text-align: center; word-wrap: break-word;"><a href="http://jwt-authentication.sbvita.tk">http://jwt-authentication.sbvita.tk</a></p></nav><div class="content"><header><h1 id="top">JWT Auth</h1></header><p>Simple JWT Authentication in Laravel 5.1</p>
<section id="jwt-auth-api" class="resource-group"><h2 class="group-heading">JWT Auth API<a href="#jwt-auth-api" class="permalink">&para;</a></h2><div id="jwt-auth-api-login" class="resource"><h3 class="resource-heading">Login<a href="#jwt-auth-api-login" class="permalink">&para;</a></h3><div id="jwt-auth-api-login-post" class="action post"><h4 class="action-heading"><div class="name">Login</div><a href="#jwt-auth-api-login-post" class="method post">POST</a><code class="uri">/api/auth/login</code></h4><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Accept</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"salvatore@3rdsense.com"</span></span>,
  "<span class="hljs-attribute">password</span>": <span class="hljs-value"><span class="hljs-string">"Password1"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Authorization</span>: <span class="hljs-string">{{token}}</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">token</span>": <span class="hljs-value"><span class="hljs-string">"eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsImlzcyI6Imh0dHA6XC9cL3NnZmxlZXQuYXBwXC9hcGlcL2F1dGhcL2xvZ2luIiwiaWF0IjoiMTQzNzQzNTA4NCIsImV4cCI6IjE0Mzc0Mzg2ODQiLCJuYmYiOiIxNDM3NDM1MDg0IiwianRpIjoiZDM0NDM2MWE0YzVjZTMzZWNiMDFmNmJiM2NkNzc4Y2YifQ.aonwHxeLVB0wyuLf2pcRBvFp_YKpC81jQuqQoyJbHEM"</span></span>,
        "<span class="hljs-attribute">first_name</span>": <span class="hljs-value"><span class="hljs-string">"john"</span></span>,
        "<span class="hljs-attribute">last_name</span>": <span class="hljs-value"><span class="hljs-string">"smith"</span></span>,
        "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"someone@example.com"</span></span>,
        "<span class="hljs-attribute">links</span>": <span class="hljs-value">[
            {
            "<span class="hljs-attribute">rel</span>": <span class="hljs-value"><span class="hljs-string">"logout"</span></span>,
            "<span class="hljs-attribute">uri</span>": <span class="hljs-value"><span class="hljs-string">"http:\\/\\/jwt-auth.app\\/api\\/auth\\/logout"</span>
          </span>}
        ]</span>,
    }
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>401</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">error</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"Invalid Credentials"</span></span>,
    "<span class="hljs-attribute">status_code</span>": <span class="hljs-value"><span class="hljs-number">401</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="jwt-auth-api-logout" class="resource"><h3 class="resource-heading">Logout<a href="#jwt-auth-api-logout" class="permalink">&para;</a></h3><div id="jwt-auth-api-logout-post" class="action post"><h4 class="action-heading"><div class="name">Logout</div><a href="#jwt-auth-api-logout-post" class="method post">POST</a><code class="uri">/api/auth/logout</code></h4><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Authorization</span>: <span class="hljs-string">{{token}}</span><br><span class="hljs-attribute">Accept</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">success</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"Logout successful."</span></span>,
    "<span class="hljs-attribute">status_code</span>": <span class="hljs-value"><span class="hljs-number">200</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="jwt-auth-api-forgot-password" class="resource"><h3 class="resource-heading">Forgot password<a href="#jwt-auth-api-forgot-password" class="permalink">&para;</a></h3><div id="jwt-auth-api-forgot-password-post" class="action post"><h4 class="action-heading"><div class="name">Forgot password</div><a href="#jwt-auth-api-forgot-password-post" class="method post">POST</a><code class="uri">/api/auth/forgot-password</code></h4><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Accept</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"salvatore@3rdsense.com"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">success</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"Email sent"</span></span>,
    "<span class="hljs-attribute">status_code</span>": <span class="hljs-value"><span class="hljs-number">200</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>401</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">error</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"Email does not exist"</span></span>,
    "<span class="hljs-attribute">status_code</span>": <span class="hljs-value"><span class="hljs-number">401</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="jwt-auth-api-activate-new-user" class="resource"><h3 class="resource-heading">Activate new user<a href="#jwt-auth-api-activate-new-user" class="permalink">&para;</a></h3><div id="jwt-auth-api-activate-new-user-post" class="action post"><h4 class="action-heading"><div class="name">Activate new user</div><a href="#jwt-auth-api-activate-new-user-post" class="method post">POST</a><code class="uri">/api/auth/activate</code></h4><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Accept</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"salvatore@3rdsense.com"</span></span>,
  "<span class="hljs-attribute">code</span>": <span class="hljs-value"><span class="hljs-number">5896</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Authorization</span>: <span class="hljs-string">Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXUyJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2dsYXNzaG91c2U1MDUuYXBpXC9hcGlcL3VzZXJzXC9sb2dpbiIsImlhdCI6IjE0Mjk1MzcyMDQiLCJleHAiOiIxNDI5NjIzNjA0IiwibmJmIjoiMTQyOTUzNzIwNCIsImp0aSI6ImUyM2I3MDU1YThmYjU1MTc4OTZiOWI5MGEyMzI5YjRiIn0.NDNmOGNhNTA0NWJkNTRmNmMzN2FiZDZmZTdkNWE1ODYxOWFmOTNjMTViZTViMWQ0OTdhYTM5OTgwNDBkODcxOA</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">first_name</span>": <span class="hljs-value"><span class="hljs-string">"john"</span></span>,
    "<span class="hljs-attribute">last_name</span>": <span class="hljs-value"><span class="hljs-string">"smith"</span></span>,
    "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"john@smith.com"</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>401</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">error</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"Wrong Code"</span></span>,
    "<span class="hljs-attribute">status_code</span>": <span class="hljs-value"><span class="hljs-number">401</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="jwt-auth-api-resend-activation-code" class="resource"><h3 class="resource-heading">Resend Activation Code<a href="#jwt-auth-api-resend-activation-code" class="permalink">&para;</a></h3><div id="jwt-auth-api-resend-activation-code-post" class="action post"><h4 class="action-heading"><div class="name">Resend Activation Code</div><a href="#jwt-auth-api-resend-activation-code-post" class="method post">POST</a><code class="uri">/api/auth/resend-code</code></h4><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Accept</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"salvatore@3rdsense.com"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">success</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"Code sent"</span></span>,
    "<span class="hljs-attribute">status_code</span>": <span class="hljs-value"><span class="hljs-number">200</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>401</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">error</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"Email does not exist"</span></span>,
    "<span class="hljs-attribute">status_code</span>": <span class="hljs-value"><span class="hljs-number">401</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="jwt-auth-api-users" class="resource"><h3 class="resource-heading">Users<a href="#jwt-auth-api-users" class="permalink">&para;</a></h3><div id="jwt-auth-api-users-post" class="action post"><h4 class="action-heading"><div class="name">Register a new user</div><a href="#jwt-auth-api-users-post" class="method post">POST</a><code class="uri">/api/users</code></h4><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Accept</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">first_name</span>": <span class="hljs-value"><span class="hljs-string">"john"</span></span>,
  "<span class="hljs-attribute">last_name</span>": <span class="hljs-value"><span class="hljs-string">"smith"</span></span>,
  "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"salvatorebalzano@hotmail.it"</span></span>,
  "<span class="hljs-attribute">password</span>": <span class="hljs-value"><span class="hljs-string">"Password1"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
    "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
        "<span class="hljs-attribute">token</span>": <span class="hljs-value"><span class="hljs-string">"eyJhbGciOiJIUzI1NiJ9.eyJzdWIiOjIsImlzcyI6Imh0dHA6XC9cL3NnZmxlZXQuYXBwXC9hcGlcL2F1dGhcL2xvZ2luIiwiaWF0IjoiMTQzNzQzNTA4NCIsImV4cCI6IjE0Mzc0Mzg2ODQiLCJuYmYiOiIxNDM3NDM1MDg0IiwianRpIjoiZDM0NDM2MWE0YzVjZTMzZWNiMDFmNmJiM2NkNzc4Y2YifQ.aonwHxeLVB0wyuLf2pcRBvFp_YKpC81jQuqQoyJbHEM"</span></span>,
        "<span class="hljs-attribute">first_name</span>": <span class="hljs-value"><span class="hljs-string">"john"</span></span>,
        "<span class="hljs-attribute">last_name</span>": <span class="hljs-value"><span class="hljs-string">"smith"</span></span>,
        "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"john@smith.com"</span>
        <span class="hljs-string">"links"</span>: [
            {
            "<span class="hljs-attribute">rel</span>": <span class="hljs-value"><span class="hljs-string">"logout"</span></span>,
            "<span class="hljs-attribute">uri</span>": <span class="hljs-value"><span class="hljs-string">"http:\\/\\/jwt-auth.app\\/api\\/auth\\/logout"</span>
          </span>}
        ]
    </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>422</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">error</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"Unable to register new user"</span></span>,
    "<span class="hljs-attribute">status_code</span>": <span class="hljs-value"><span class="hljs-number">422</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="jwt-auth-api-users-put" class="action put"><h4 class="action-heading"><div class="name">Update user</div><a href="#jwt-auth-api-users-put" class="method put">PUT</a><code class="uri">/api/users</code></h4><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Authorization</span>: <span class="hljs-string">{{token}}</span><br><span class="hljs-attribute">Accept</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">first_name</span>": <span class="hljs-value"><span class="hljs-string">"john"</span></span>,
  "<span class="hljs-attribute">last_name</span>": <span class="hljs-value"><span class="hljs-string">"smith"</span></span>,
  "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"john@smith.com"</span></span>,
  "<span class="hljs-attribute">password</span>": <span class="hljs-value"><span class="hljs-string">"password"</span>
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Authorization</span>: <span class="hljs-string">Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXUyJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2dsYXNzaG91c2U1MDUuYXBpXC9hcGlcL3VzZXJzXC9sb2dpbiIsImlhdCI6IjE0Mjk1MzcyMDQiLCJleHAiOiIxNDI5NjIzNjA0IiwibmJmIjoiMTQyOTUzNzIwNCIsImp0aSI6ImUyM2I3MDU1YThmYjU1MTc4OTZiOWI5MGEyMzI5YjRiIn0.NDNmOGNhNTA0NWJkNTRmNmMzN2FiZDZmZTdkNWE1ODYxOWFmOTNjMTViZTViMWQ0OTdhYTM5OTgwNDBkODcxOA</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">success</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"User profile updated"</span></span>,
    "<span class="hljs-attribute">status_code</span>": <span class="hljs-value"><span class="hljs-number">200</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>422</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">error</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"Unable to update user profile"</span></span>,
    "<span class="hljs-attribute">status_code</span>": <span class="hljs-value"><span class="hljs-number">422</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="jwt-auth-api-users-get" class="action get"><h4 class="action-heading"><div class="name">Get user profile</div><a href="#jwt-auth-api-users-get" class="method get">GET</a><code class="uri">/api/users</code></h4><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Authorization</span>: <span class="hljs-string">{{token}}</span><br><span class="hljs-attribute">Accept</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Authorization</span>: <span class="hljs-string">Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXUyJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2dsYXNzaG91c2U1MDUuYXBpXC9hcGlcL3VzZXJzXC9sb2dpbiIsImlhdCI6IjE0Mjk1MzcyMDQiLCJleHAiOiIxNDI5NjIzNjA0IiwibmJmIjoiMTQyOTUzNzIwNCIsImp0aSI6ImUyM2I3MDU1YThmYjU1MTc4OTZiOWI5MGEyMzI5YjRiIn0.NDNmOGNhNTA0NWJkNTRmNmMzN2FiZDZmZTdkNWE1ODYxOWFmOTNjMTViZTViMWQ0OTdhYTM5OTgwNDBkODcxOA</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">first_name</span>": <span class="hljs-value"><span class="hljs-string">"john"</span></span>,
    "<span class="hljs-attribute">last_name</span>": <span class="hljs-value"><span class="hljs-string">"smith"</span></span>,
    "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"john@smith.com"</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>401</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Authorization</span>: <span class="hljs-string">Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXUyJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2dsYXNzaG91c2U1MDUuYXBpXC9hcGlcL3VzZXJzXC9sb2dpbiIsImlhdCI6IjE0Mjk1MzcyMDQiLCJleHAiOiIxNDI5NjIzNjA0IiwibmJmIjoiMTQyOTUzNzIwNCIsImp0aSI6ImUyM2I3MDU1YThmYjU1MTc4OTZiOWI5MGEyMzI5YjRiIn0.NDNmOGNhNTA0NWJkNTRmNmMzN2FiZDZmZTdkNWE1ODYxOWFmOTNjMTViZTViMWQ0OTdhYTM5OTgwNDBkODcxOA</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">error</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"Unable to retrieve user"</span></span>,
    "<span class="hljs-attribute">status_code</span>": <span class="hljs-value"><span class="hljs-number">401</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div><div id="jwt-auth-api-users-get-1" class="action get"><h4 class="action-heading"><div class="name">Get other user's profile</div><a href="#jwt-auth-api-users-get-1" class="method get">GET</a><code class="uri">/api/users/{id}</code></h4><div class="title"><strong>Parameters</strong><div class="collapse-button show"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><dl class="inner"><dt>id</dt><dd><code>number</code>&nbsp;<span class="required">(required)</span>&nbsp;<span class="text-muted example"><strong>Example:&nbsp;</strong><span>1</span></span><p>ID of the User in form of an integer</p>
</dd></dl></div><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Authorization</span>: <span class="hljs-string">{{token}}</span><br><span class="hljs-attribute">Accept</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Authorization</span>: <span class="hljs-string">Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXUyJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2dsYXNzaG91c2U1MDUuYXBpXC9hcGlcL3VzZXJzXC9sb2dpbiIsImlhdCI6IjE0Mjk1MzcyMDQiLCJleHAiOiIxNDI5NjIzNjA0IiwibmJmIjoiMTQyOTUzNzIwNCIsImp0aSI6ImUyM2I3MDU1YThmYjU1MTc4OTZiOWI5MGEyMzI5YjRiIn0.NDNmOGNhNTA0NWJkNTRmNmMzN2FiZDZmZTdkNWE1ODYxOWFmOTNjMTViZTViMWQ0OTdhYTM5OTgwNDBkODcxOA</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">data</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">first_name</span>": <span class="hljs-value"><span class="hljs-string">"john"</span></span>,
    "<span class="hljs-attribute">last_name</span>": <span class="hljs-value"><span class="hljs-string">"smith"</span></span>,
    "<span class="hljs-attribute">email</span>": <span class="hljs-value"><span class="hljs-string">"john@smith.com"</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>401</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Authorization</span>: <span class="hljs-string">Bearer eyJhbGciOiJIUzI1NiIsInR5cCI6IkpXUyJ9.eyJzdWIiOjEsImlzcyI6Imh0dHA6XC9cL2dsYXNzaG91c2U1MDUuYXBpXC9hcGlcL3VzZXJzXC9sb2dpbiIsImlhdCI6IjE0Mjk1MzcyMDQiLCJleHAiOiIxNDI5NjIzNjA0IiwibmJmIjoiMTQyOTUzNzIwNCIsImp0aSI6ImUyM2I3MDU1YThmYjU1MTc4OTZiOWI5MGEyMzI5YjRiIn0.NDNmOGNhNTA0NWJkNTRmNmMzN2FiZDZmZTdkNWE1ODYxOWFmOTNjMTViZTViMWQ0OTdhYTM5OTgwNDBkODcxOA</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">error</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"Unable to retrieve user"</span></span>,
    "<span class="hljs-attribute">status_code</span>": <span class="hljs-value"><span class="hljs-number">401</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div><div id="jwt-auth-api-status" class="resource"><h3 class="resource-heading">Status<a href="#jwt-auth-api-status" class="permalink">&para;</a></h3><div id="jwt-auth-api-status-get" class="action get"><h4 class="action-heading"><div class="name">Check Status</div><a href="#jwt-auth-api-status-get" class="method get">GET</a><code class="uri">/api/status</code></h4><div class="title"><strong>Request</strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span><br><span class="hljs-attribute">Accept</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>200</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">success</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"OK"</span></span>,
    "<span class="hljs-attribute">status_code</span>": <span class="hljs-value"><span class="hljs-number">200</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div><div class="title"><strong>Response&nbsp;&nbsp;<code>401</code></strong><div class="collapse-button"><span class="close">Hide</span><span class="open">Show</span></div></div><div class="collapse-content"><div class="inner"><h5>Headers</h5><pre><code><span class="hljs-attribute">Content-Type</span>: <span class="hljs-string">application/json</span></code></pre><div style="height: 1px;"></div><h5>Body</h5><pre><code>{
  "<span class="hljs-attribute">error</span>": <span class="hljs-value">{
    "<span class="hljs-attribute">message</span>": <span class="hljs-value"><span class="hljs-string">"App update in progress, please come back soon"</span></span>,
    "<span class="hljs-attribute">status_code</span>": <span class="hljs-value"><span class="hljs-number">503</span>
  </span>}
</span>}</code></pre><div style="height: 1px;"></div></div></div></div></div></section></div></div></div><p style="text-align: center;" class="text-muted">Generated by sbVita on 23 Aug 2015</p><script>/* eslint-env browser */
/* eslint quotes: [2, "single"] */
'use strict';

/*
  Determine if a string ends with another string.
*/
function endsWith(str, suffix) {
    return str.indexOf(suffix, str.length - suffix.length) !== -1;
}

/*
  Get an array [width, height] of the window.
*/
function getWindowDimensions() {
  var w = window,
      d = document,
      e = d.documentElement,
      g = d.body,
      x = w.innerWidth || e.clientWidth || g.clientWidth,
      y = w.innerHeight || e.clientHeight || g.clientHeight;

  return [x, y];
}

/*
  Collapse or show a request/response example.
*/
function toggleCollapseButton(event) {
    var button = event.target.parentNode;
    var content = button.parentNode.nextSibling;
    var inner = content.children[0];

    if (button.className.indexOf('collapse-button') === -1) {
      // Clicked without hitting the right element?
      return;
    }

    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
        // Currently showing, so let's hide it
        button.className = 'collapse-button';
        content.style.maxHeight = '0px';
    } else {
        // Currently hidden, so let's show it
        button.className = 'collapse-button show';
        content.style.maxHeight = inner.offsetHeight + 12 + 'px';
    }
}

/*
  Collapse or show a navigation menu. It will not be hidden unless it
  is currently selected or `force` has been passed.
*/
function toggleCollapseNav(event, force) {
    var heading = event.target.parentNode;
    var content = heading.nextSibling;
    var inner = content.children[0];

    if (heading.className.indexOf('heading') === -1) {
      // Clicked without hitting the right element?
      return;
    }

    if (content.style.maxHeight && content.style.maxHeight !== '0px') {
      // Currently showing, so let's hide it, but only if this nav item
      // is already selected. This prevents newly selected items from
      // collapsing in an annoying fashion.
      if (force || window.location.hash && endsWith(event.target.href, window.location.hash)) {
        content.style.maxHeight = '0px';
      }
    } else {
      // Currently hidden, so let's show it
      content.style.maxHeight = inner.offsetHeight + 12 + 'px';
    }
}

/*
  Refresh the page after a live update from the server. This only
  works in live preview mode (using the `--server` parameter).
*/
function refresh(body) {
    document.querySelector('body').className = 'preload';
    document.body.innerHTML = body;

    // Re-initialize the page
    init();
    autoCollapse();

    document.querySelector('body').className = '';
}

/*
  Determine which navigation items should be auto-collapsed to show as many
  as possible on the screen, based on the current window height. This also
  collapses them.
*/
function autoCollapse() {
  var windowHeight = getWindowDimensions()[1];
  var itemsHeight = 64; /* Account for some padding */
  var itemsArray = Array.prototype.slice.call(
    document.querySelectorAll('nav .resource-group .heading'));

  // Get the total height of the navigation items
  itemsArray.forEach(function (item) {
    itemsHeight += item.parentNode.offsetHeight;
  });

  // Should we auto-collapse any nav items? Try to find the smallest item
  // that can be collapsed to show all items on the screen. If not possible,
  // then collapse the largest item and do it again. First, sort the items
  // by height from smallest to largest.
  var sortedItems = itemsArray.sort(function (a, b) {
    return a.parentNode.offsetHeight - b.parentNode.offsetHeight;
  });

  while (sortedItems.length && itemsHeight > windowHeight) {
    for (var i = 0; i < sortedItems.length; i++) {
      // Will collapsing this item help?
      var itemHeight = sortedItems[i].nextSibling.offsetHeight;
      if ((itemsHeight - itemHeight <= windowHeight) || i === sortedItems.length - 1) {
        // It will, so let's collapse it, remove its content height from
        // our total and then remove it from our list of candidates
        // that can be collapsed.
        itemsHeight -= itemHeight;
        toggleCollapseNav({target: sortedItems[i].children[0]}, true);
        sortedItems.splice(i, 1);
        break;
      }
    }
  }
}

/*
  Initialize the interactive functionality of the page.
*/
function init() {
    var i;

    // Make collapse buttons clickable
    var buttons = document.querySelectorAll('.collapse-button');
    for (i = 0; i < buttons.length; i++) {
        buttons[i].onclick = toggleCollapseButton;

        // Show by default? Then toggle now.
        if (buttons[i].className.indexOf('show') !== -1) {
            toggleCollapseButton({target: buttons[i].children[0]});
        }
    }

    // Make nav items clickable to collapse/expand their content.
    var navItems = document.querySelectorAll('nav .resource-group .heading');
    for (i = 0; i < navItems.length; i++) {
        navItems[i].onclick = toggleCollapseNav;

        // Show all by default
        toggleCollapseNav({target: navItems[i].children[0]});
    }
}

// Initial call to set up buttons
init();

window.onload = function () {
    autoCollapse();
    // Remove the `preload` class to enable animations
    document.querySelector('body').className = '';
};
</script></body></html>