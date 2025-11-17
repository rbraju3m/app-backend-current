<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta content="IE=edge,chrome=1" http-equiv="X-UA-Compatible">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>appza-local API Documentation</title>

    <link href="https://fonts.googleapis.com/css?family=Open+Sans&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.style.css") }}" media="screen">
    <link rel="stylesheet" href="{{ asset("/vendor/scribe/css/theme-default.print.css") }}" media="print">

    <script src="https://cdn.jsdelivr.net/npm/lodash@4.17.10/lodash.min.js"></script>

    <link rel="stylesheet"
          href="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/styles/obsidian.min.css">
    <script src="https://unpkg.com/@highlightjs/cdn-assets@11.6.0/highlight.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jets/0.14.1/jets.min.js"></script>

    <style id="language-style">
        /* starts out as display none and is replaced with js later  */
                    body .content .bash-example code { display: none; }
                    body .content .javascript-example code { display: none; }
            </style>

    <script>
        var tryItOutBaseUrl = "http://localhost";
        var useCsrf = Boolean();
        var csrfUrl = "/sanctum/csrf-cookie";
    </script>
    <script src="{{ asset("/vendor/scribe/js/tryitout-5.5.0.js") }}"></script>

    <script src="{{ asset("/vendor/scribe/js/theme-default-5.5.0.js") }}"></script>

</head>

<body data-languages="[&quot;bash&quot;,&quot;javascript&quot;]">

<a href="#" id="nav-button">
    <span>
        MENU
        <img src="{{ asset("/vendor/scribe/images/navbar.png") }}" alt="navbar-image"/>
    </span>
</a>
<div class="tocify-wrapper">
    
            <div class="lang-selector">
                                            <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                            <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                    </div>
    
    <div class="search">
        <input type="text" class="search" id="input-search" placeholder="Search">
    </div>

    <div id="toc">
                    <ul id="tocify-header-introduction" class="tocify-header">
                <li class="tocify-item level-1" data-unique="introduction">
                    <a href="#introduction">Introduction</a>
                </li>
                            </ul>
                    <ul id="tocify-header-authenticating-requests" class="tocify-header">
                <li class="tocify-item level-1" data-unique="authenticating-requests">
                    <a href="#authenticating-requests">Authenticating requests</a>
                </li>
                            </ul>
                    <ul id="tocify-header-endpoints" class="tocify-header">
                <li class="tocify-item level-1" data-unique="endpoints">
                    <a href="#endpoints">Endpoints</a>
                </li>
                                    <ul id="tocify-subheader-endpoints" class="tocify-subheader">
                                                    <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-versions">
                                <a href="#endpoints-GETapi-appza-versions">GET api/appza/versions</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v0-lead-store--product-">
                                <a href="#endpoints-POSTapi-appza-v0-lead-store--product-">POST api/appza/v0/lead/store/{product}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v0-themes">
                                <a href="#endpoints-GETapi-appza-v0-themes">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v0-themes-get-theme">
                                <a href="#endpoints-GETapi-appza-v0-themes-get-theme">GET api/appza/v0/themes/get-theme</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v0-page-component">
                                <a href="#endpoints-GETapi-appza-v0-page-component">GET api/appza/v0/page-component</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v0-global-config">
                                <a href="#endpoints-GETapi-appza-v0-global-config">GET api/appza/v0/global-config</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v0-free-trial--product-">
                                <a href="#endpoints-POSTapi-appza-v0-free-trial--product-">POST api/appza/v0/free/trial/{product}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v0-firebase-credential--product-">
                                <a href="#endpoints-GETapi-appza-v0-firebase-credential--product-">GET api/appza/v0/firebase/credential/{product}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v0-license-check">
                                <a href="#endpoints-GETapi-appza-v0-license-check">GET api/appza/v0/license/check</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v0-license-activate">
                                <a href="#endpoints-POSTapi-appza-v0-license-activate">POST api/appza/v0/license/activate</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v0-license-deactivate">
                                <a href="#endpoints-GETapi-appza-v0-license-deactivate">GET api/appza/v0/license/deactivate</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v0-license-version-check">
                                <a href="#endpoints-POSTapi-appza-v0-license-version-check">POST api/appza/v0/license/version/check</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v0-app-license-check">
                                <a href="#endpoints-GETapi-appza-v0-app-license-check">GET api/appza/v0/app/license-check</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v0-build">
                                <a href="#endpoints-POSTapi-appza-v0-build">POST api/appza/v0/build</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v0-build-history">
                                <a href="#endpoints-GETapi-appza-v0-build-history">GET api/appza/v0/build/history</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v0-build-resource">
                                <a href="#endpoints-POSTapi-appza-v0-build-resource">POST api/appza/v0/build/resource</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v0-build-ios-keys-verify">
                                <a href="#endpoints-POSTapi-appza-v0-build-ios-keys-verify">POST api/appza/v0/build/ios-keys-verify</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v0-build-ios-check-app-name">
                                <a href="#endpoints-POSTapi-appza-v0-build-ios-check-app-name">POST api/appza/v0/build/ios-check-app-name</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v0-build-response--id-">
                                <a href="#endpoints-POSTapi-appza-v0-build-response--id-">POST api/appza/v0/build/response/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v0-build-process-start--id-">
                                <a href="#endpoints-POSTapi-appza-v0-build-process-start--id-">POST api/appza/v0/build/process-start/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v0-plugins">
                                <a href="#endpoints-GETapi-appza-v0-plugins">GET api/appza/v0/plugins</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v0-plugin-check-disable">
                                <a href="#endpoints-GETapi-appza-v0-plugin-check-disable">GET api/appza/v0/plugin/check-disable</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v0-plugin-version-check">
                                <a href="#endpoints-GETapi-appza-v0-plugin-version-check">GET api/appza/v0/plugin/version-check</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v1-lead-store--product-">
                                <a href="#endpoints-POSTapi-appza-v1-lead-store--product-">POST api/appza/v1/lead/store/{product}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v1-themes">
                                <a href="#endpoints-GETapi-appza-v1-themes">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v1-themes-get-theme">
                                <a href="#endpoints-GETapi-appza-v1-themes-get-theme">GET api/appza/v1/themes/get-theme</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v1-page-component">
                                <a href="#endpoints-GETapi-appza-v1-page-component">GET api/appza/v1/page-component</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v1-global-config">
                                <a href="#endpoints-GETapi-appza-v1-global-config">GET api/appza/v1/global-config</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v1-free-trial--product-">
                                <a href="#endpoints-POSTapi-appza-v1-free-trial--product-">POST api/appza/v1/free/trial/{product}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v1-firebase-credential--product-">
                                <a href="#endpoints-GETapi-appza-v1-firebase-credential--product-">GET api/appza/v1/firebase/credential/{product}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v1-license-check">
                                <a href="#endpoints-GETapi-appza-v1-license-check">GET api/appza/v1/license/check</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v1-license-activate">
                                <a href="#endpoints-POSTapi-appza-v1-license-activate">POST api/appza/v1/license/activate</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v1-license-deactivate">
                                <a href="#endpoints-GETapi-appza-v1-license-deactivate">GET api/appza/v1/license/deactivate</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v1-license-version-check">
                                <a href="#endpoints-POSTapi-appza-v1-license-version-check">POST api/appza/v1/license/version/check</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v1-app-license-check">
                                <a href="#endpoints-GETapi-appza-v1-app-license-check">GET api/appza/v1/app/license-check</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v1-build-resource">
                                <a href="#endpoints-POSTapi-appza-v1-build-resource">POST api/appza/v1/build/resource</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v1-build-ios-keys-verify">
                                <a href="#endpoints-POSTapi-appza-v1-build-ios-keys-verify">POST api/appza/v1/build/ios-keys-verify</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v1-build">
                                <a href="#endpoints-POSTapi-appza-v1-build">POST api/appza/v1/build</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v1-build-history">
                                <a href="#endpoints-GETapi-appza-v1-build-history">GET api/appza/v1/build/history</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v1-build-ios-check-app-name">
                                <a href="#endpoints-POSTapi-appza-v1-build-ios-check-app-name">POST api/appza/v1/build/ios-check-app-name</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v1-build-response--id-">
                                <a href="#endpoints-POSTapi-appza-v1-build-response--id-">POST api/appza/v1/build/response/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v1-build-process-start--id-">
                                <a href="#endpoints-POSTapi-appza-v1-build-process-start--id-">POST api/appza/v1/build/process-start/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v1-plugins">
                                <a href="#endpoints-GETapi-appza-v1-plugins">GET api/appza/v1/plugins</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v1-plugin-check-disable">
                                <a href="#endpoints-GETapi-appza-v1-plugin-check-disable">GET api/appza/v1/plugin/check-disable</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v1-plugin-install-latest-version">
                                <a href="#endpoints-GETapi-appza-v1-plugin-install-latest-version">GET api/appza/v1/plugin/install-latest-version</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v1-plugin-version-check">
                                <a href="#endpoints-GETapi-appza-v1-plugin-version-check">GET api/appza/v1/plugin/version-check</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v2-lead-store--product-">
                                <a href="#endpoints-POSTapi-appza-v2-lead-store--product-">POST api/appza/v2/lead/store/{product}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v2-themes">
                                <a href="#endpoints-GETapi-appza-v2-themes">Display a listing of the resource.</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v2-themes-get-theme">
                                <a href="#endpoints-GETapi-appza-v2-themes-get-theme">GET api/appza/v2/themes/get-theme</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v2-page-component">
                                <a href="#endpoints-GETapi-appza-v2-page-component">GET api/appza/v2/page-component</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v2-global-config">
                                <a href="#endpoints-GETapi-appza-v2-global-config">GET api/appza/v2/global-config</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v2-free-trial--product-">
                                <a href="#endpoints-POSTapi-appza-v2-free-trial--product-">POST api/appza/v2/free/trial/{product}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v2-firebase-credential--product-">
                                <a href="#endpoints-GETapi-appza-v2-firebase-credential--product-">GET api/appza/v2/firebase/credential/{product}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v2-license-check">
                                <a href="#endpoints-GETapi-appza-v2-license-check">GET api/appza/v2/license/check</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v2-license-activate">
                                <a href="#endpoints-POSTapi-appza-v2-license-activate">POST api/appza/v2/license/activate</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v2-license-deactivate">
                                <a href="#endpoints-GETapi-appza-v2-license-deactivate">GET api/appza/v2/license/deactivate</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v2-license-version-check">
                                <a href="#endpoints-POSTapi-appza-v2-license-version-check">POST api/appza/v2/license/version/check</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v2-app-license-check">
                                <a href="#endpoints-GETapi-appza-v2-app-license-check">Mobile (app) check (params: site_url + product)</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v2-build">
                                <a href="#endpoints-POSTapi-appza-v2-build">POST api/appza/v2/build</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v2-build-history">
                                <a href="#endpoints-GETapi-appza-v2-build-history">GET api/appza/v2/build/history</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v2-build-resource">
                                <a href="#endpoints-POSTapi-appza-v2-build-resource">POST api/appza/v2/build/resource</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v2-build-ios-keys-verify">
                                <a href="#endpoints-POSTapi-appza-v2-build-ios-keys-verify">POST api/appza/v2/build/ios-keys-verify</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v2-build-ios-check-app-name">
                                <a href="#endpoints-POSTapi-appza-v2-build-ios-check-app-name">POST api/appza/v2/build/ios-check-app-name</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v2-build-response--id-">
                                <a href="#endpoints-POSTapi-appza-v2-build-response--id-">POST api/appza/v2/build/response/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-POSTapi-appza-v2-build-process-start--id-">
                                <a href="#endpoints-POSTapi-appza-v2-build-process-start--id-">POST api/appza/v2/build/process-start/{id}</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v2-plugins">
                                <a href="#endpoints-GETapi-appza-v2-plugins">GET api/appza/v2/plugins</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v2-plugin-check-disable">
                                <a href="#endpoints-GETapi-appza-v2-plugin-check-disable">GET api/appza/v2/plugin/check-disable</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v2-plugin-install-latest-version">
                                <a href="#endpoints-GETapi-appza-v2-plugin-install-latest-version">GET api/appza/v2/plugin/install-latest-version</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi-appza-v2-plugin-version-check">
                                <a href="#endpoints-GETapi-appza-v2-plugin-version-check">GET api/appza/v2/plugin/version-check</a>
                            </li>
                                                                                <li class="tocify-item level-2" data-unique="endpoints-GETapi--fallbackPlaceholder-">
                                <a href="#endpoints-GETapi--fallbackPlaceholder-">GET api/{fallbackPlaceholder}</a>
                            </li>
                                                                        </ul>
                            </ul>
            </div>

    <ul class="toc-footer" id="toc-footer">
                    <li style="padding-bottom: 5px;"><a href="{{ route("scribe.postman") }}">View Postman collection</a></li>
                            <li style="padding-bottom: 5px;"><a href="{{ route("scribe.openapi") }}">View OpenAPI spec</a></li>
                <li><a href="http://github.com/knuckleswtf/scribe">Documentation powered by Scribe ✍</a></li>
    </ul>

    <ul class="toc-footer" id="last-updated">
        <li>Last updated: November 16, 2025</li>
    </ul>
</div>

<div class="page-wrapper">
    <div class="dark-box"></div>
    <div class="content">
        <h1 id="introduction">Introduction</h1>
<aside>
    <strong>Base URL</strong>: <code>http://localhost</code>
</aside>
<pre><code>This documentation aims to provide all the information you need to work with our API.

&lt;aside&gt;As you scroll, you'll see code examples for working with the API in different programming languages in the dark area to the right (or as part of the content on mobile).
You can switch the language used with the tabs at the top right (or from the nav menu at the top left on mobile).&lt;/aside&gt;</code></pre>

        <h1 id="authenticating-requests">Authenticating requests</h1>
<p>This API is not authenticated.</p>

        <h1 id="endpoints">Endpoints</h1>

    

                                <h2 id="endpoints-GETapi-appza-versions">GET api/appza/versions</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-versions">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/versions" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/versions"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-versions">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;available_versions&quot;: {
        &quot;v0&quot;: {
            &quot;status&quot;: &quot;deprecated&quot;,
            &quot;deprecated_at&quot;: &quot;2025-01-01 23:59:59&quot;,
            &quot;sunset_at&quot;: &quot;2025-11-09 23:59:59&quot;,
            &quot;docs_url&quot;: &quot;&quot;,
            &quot;message&quot;: &quot;API v0 is deprecated and will be removed on 2025-06-30.&quot;
        },
        &quot;v1&quot;: {
            &quot;status&quot;: &quot;active&quot;,
            &quot;deprecated_at&quot;: null,
            &quot;sunset_at&quot;: null,
            &quot;docs_url&quot;: &quot;&quot;,
            &quot;message&quot;: &quot;API v1 is active and stable.&quot;
        },
        &quot;v2&quot;: {
            &quot;status&quot;: &quot;recommended&quot;,
            &quot;deprecated_at&quot;: null,
            &quot;sunset_at&quot;: null,
            &quot;docs_url&quot;: &quot;&quot;,
            &quot;message&quot;: &quot;API v2 is the latest recommended version.&quot;
        }
    },
    &quot;recommended_version&quot;: &quot;v2&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-versions" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-versions"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-versions"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-versions" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-versions">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-versions" data-method="GET"
      data-path="api/appza/versions"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-versions', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-versions"
                    onclick="tryItOut('GETapi-appza-versions');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-versions"
                    onclick="cancelTryOut('GETapi-appza-versions');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-versions"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/versions</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-versions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-versions"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-appza-v0-lead-store--product-">POST api/appza/v0/lead/store/{product}</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v0-lead-store--product-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v0/lead/store/appza|lazy_task|fcom_mobile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first_name\": \"consequatur\",
    \"last_name\": \"consequatur\",
    \"email\": \"carolyne.luettgen@example.org\",
    \"domain\": \"http:\\/\\/www.russel.info\\/minus-voluptatem-quisquam-quibusdam-sed\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/lead/store/appza|lazy_task|fcom_mobile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "consequatur",
    "last_name": "consequatur",
    "email": "carolyne.luettgen@example.org",
    "domain": "http:\/\/www.russel.info\/minus-voluptatem-quisquam-quibusdam-sed"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v0-lead-store--product-">
</span>
<span id="execution-results-POSTapi-appza-v0-lead-store--product-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v0-lead-store--product-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v0-lead-store--product-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v0-lead-store--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v0-lead-store--product-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v0-lead-store--product-" data-method="POST"
      data-path="api/appza/v0/lead/store/{product}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v0-lead-store--product-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v0-lead-store--product-"
                    onclick="tryItOut('POSTapi-appza-v0-lead-store--product-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v0-lead-store--product-"
                    onclick="cancelTryOut('POSTapi-appza-v0-lead-store--product-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v0-lead-store--product-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v0/lead/store/{product}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v0-lead-store--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v0-lead-store--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="POSTapi-appza-v0-lead-store--product-"
               value="appza|lazy_task|fcom_mobile"
               data-component="url">
    <br>
<p>Example: <code>appza|lazy_task|fcom_mobile</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTapi-appza-v0-lead-store--product-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTapi-appza-v0-lead-store--product-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-appza-v0-lead-store--product-"
               value="carolyne.luettgen@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>carolyne.luettgen@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>domain</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="domain"                data-endpoint="POSTapi-appza-v0-lead-store--product-"
               value="http://www.russel.info/minus-voluptatem-quisquam-quibusdam-sed"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.russel.info/minus-voluptatem-quisquam-quibusdam-sed</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v0-themes">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v0-themes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v0/themes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/themes"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v0-themes">
            <blockquote>
            <p>Example response (410):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;API version v0 has been retired.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;,
    &quot;docs_url&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v0-themes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v0-themes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v0-themes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v0-themes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v0-themes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v0-themes" data-method="GET"
      data-path="api/appza/v0/themes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v0-themes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v0-themes"
                    onclick="tryItOut('GETapi-appza-v0-themes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v0-themes"
                    onclick="cancelTryOut('GETapi-appza-v0-themes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v0-themes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v0/themes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v0-themes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v0-themes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v0-themes-get-theme">GET api/appza/v0/themes/get-theme</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v0-themes-get-theme">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v0/themes/get-theme" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/themes/get-theme"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v0-themes-get-theme">
            <blockquote>
            <p>Example response (410):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;API version v0 has been retired.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;,
    &quot;docs_url&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v0-themes-get-theme" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v0-themes-get-theme"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v0-themes-get-theme"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v0-themes-get-theme" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v0-themes-get-theme">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v0-themes-get-theme" data-method="GET"
      data-path="api/appza/v0/themes/get-theme"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v0-themes-get-theme', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v0-themes-get-theme"
                    onclick="tryItOut('GETapi-appza-v0-themes-get-theme');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v0-themes-get-theme"
                    onclick="cancelTryOut('GETapi-appza-v0-themes-get-theme');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v0-themes-get-theme"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v0/themes/get-theme</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v0-themes-get-theme"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v0-themes-get-theme"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v0-page-component">GET api/appza/v0/page-component</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v0-page-component">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v0/page-component" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/page-component"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v0-page-component">
            <blockquote>
            <p>Example response (410):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;API version v0 has been retired.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;,
    &quot;docs_url&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v0-page-component" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v0-page-component"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v0-page-component"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v0-page-component" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v0-page-component">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v0-page-component" data-method="GET"
      data-path="api/appza/v0/page-component"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v0-page-component', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v0-page-component"
                    onclick="tryItOut('GETapi-appza-v0-page-component');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v0-page-component"
                    onclick="cancelTryOut('GETapi-appza-v0-page-component');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v0-page-component"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v0/page-component</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v0-page-component"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v0-page-component"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v0-global-config">GET api/appza/v0/global-config</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v0-global-config">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v0/global-config" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/global-config"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v0-global-config">
            <blockquote>
            <p>Example response (410):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;API version v0 has been retired.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;,
    &quot;docs_url&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v0-global-config" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v0-global-config"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v0-global-config"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v0-global-config" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v0-global-config">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v0-global-config" data-method="GET"
      data-path="api/appza/v0/global-config"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v0-global-config', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v0-global-config"
                    onclick="tryItOut('GETapi-appza-v0-global-config');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v0-global-config"
                    onclick="cancelTryOut('GETapi-appza-v0-global-config');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v0-global-config"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v0/global-config</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v0-global-config"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v0-global-config"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-appza-v0-free-trial--product-">POST api/appza/v0/free/trial/{product}</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v0-free-trial--product-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v0/free/trial/appza|lazy_task|fcom_mobile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"email\": \"carolyne.luettgen@example.org\",
    \"site_url\": \"http:\\/\\/www.russel.info\\/minus-voluptatem-quisquam-quibusdam-sed\",
    \"plugin_slug\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/free/trial/appza|lazy_task|fcom_mobile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "email": "carolyne.luettgen@example.org",
    "site_url": "http:\/\/www.russel.info\/minus-voluptatem-quisquam-quibusdam-sed",
    "plugin_slug": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v0-free-trial--product-">
</span>
<span id="execution-results-POSTapi-appza-v0-free-trial--product-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v0-free-trial--product-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v0-free-trial--product-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v0-free-trial--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v0-free-trial--product-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v0-free-trial--product-" data-method="POST"
      data-path="api/appza/v0/free/trial/{product}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v0-free-trial--product-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v0-free-trial--product-"
                    onclick="tryItOut('POSTapi-appza-v0-free-trial--product-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v0-free-trial--product-"
                    onclick="cancelTryOut('POSTapi-appza-v0-free-trial--product-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v0-free-trial--product-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v0/free/trial/{product}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v0-free-trial--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v0-free-trial--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="POSTapi-appza-v0-free-trial--product-"
               value="appza|lazy_task|fcom_mobile"
               data-component="url">
    <br>
<p>Example: <code>appza|lazy_task|fcom_mobile</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-appza-v0-free-trial--product-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-appza-v0-free-trial--product-"
               value="carolyne.luettgen@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>carolyne.luettgen@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v0-free-trial--product-"
               value="http://www.russel.info/minus-voluptatem-quisquam-quibusdam-sed"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.russel.info/minus-voluptatem-quisquam-quibusdam-sed</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>plugin_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="plugin_slug"                data-endpoint="POSTapi-appza-v0-free-trial--product-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v0-firebase-credential--product-">GET api/appza/v0/firebase/credential/{product}</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v0-firebase-credential--product-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v0/firebase/credential/appza|lazy_task|fcom_mobile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/firebase/credential/appza|lazy_task|fcom_mobile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v0-firebase-credential--product-">
            <blockquote>
            <p>Example response (410):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;API version v0 has been fully removed.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;,
    &quot;docs_url&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v0-firebase-credential--product-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v0-firebase-credential--product-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v0-firebase-credential--product-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v0-firebase-credential--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v0-firebase-credential--product-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v0-firebase-credential--product-" data-method="GET"
      data-path="api/appza/v0/firebase/credential/{product}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v0-firebase-credential--product-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v0-firebase-credential--product-"
                    onclick="tryItOut('GETapi-appza-v0-firebase-credential--product-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v0-firebase-credential--product-"
                    onclick="cancelTryOut('GETapi-appza-v0-firebase-credential--product-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v0-firebase-credential--product-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v0/firebase/credential/{product}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v0-firebase-credential--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v0-firebase-credential--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="GETapi-appza-v0-firebase-credential--product-"
               value="appza|lazy_task|fcom_mobile"
               data-component="url">
    <br>
<p>Example: <code>appza|lazy_task|fcom_mobile</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-appza-v0-license-check">GET api/appza/v0/license/check</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v0-license-check">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v0/license/check" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"consequatur\",
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/license/check"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "consequatur",
    "license_key": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v0-license-check">
            <blockquote>
            <p>Example response (410):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;API version v0 has been retired.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;,
    &quot;docs_url&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v0-license-check" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v0-license-check"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v0-license-check"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v0-license-check" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v0-license-check">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v0-license-check" data-method="GET"
      data-path="api/appza/v0/license/check"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v0-license-check', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v0-license-check"
                    onclick="tryItOut('GETapi-appza-v0-license-check');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v0-license-check"
                    onclick="cancelTryOut('GETapi-appza-v0-license-check');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v0-license-check"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v0/license/check</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v0-license-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v0-license-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="GETapi-appza-v0-license-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="GETapi-appza-v0-license-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v0-license-activate">POST api/appza/v0/license/activate</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v0-license-activate">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v0/license/activate" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"consequatur\",
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/license/activate"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "consequatur",
    "license_key": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v0-license-activate">
</span>
<span id="execution-results-POSTapi-appza-v0-license-activate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v0-license-activate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v0-license-activate"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v0-license-activate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v0-license-activate">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v0-license-activate" data-method="POST"
      data-path="api/appza/v0/license/activate"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v0-license-activate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v0-license-activate"
                    onclick="tryItOut('POSTapi-appza-v0-license-activate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v0-license-activate"
                    onclick="cancelTryOut('POSTapi-appza-v0-license-activate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v0-license-activate"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v0/license/activate</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v0-license-activate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v0-license-activate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v0-license-activate"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v0-license-activate"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v0-license-deactivate">GET api/appza/v0/license/deactivate</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v0-license-deactivate">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v0/license/deactivate" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"http:\\/\\/kunze.biz\\/iste-laborum-eius-est-dolor.html\",
    \"product\": \"appza\",
    \"appza_action\": \"plugin_delete\",
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/license/deactivate"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "http:\/\/kunze.biz\/iste-laborum-eius-est-dolor.html",
    "product": "appza",
    "appza_action": "plugin_delete",
    "license_key": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v0-license-deactivate">
            <blockquote>
            <p>Example response (410):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;API version v0 has been retired.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;,
    &quot;docs_url&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v0-license-deactivate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v0-license-deactivate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v0-license-deactivate"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v0-license-deactivate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v0-license-deactivate">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v0-license-deactivate" data-method="GET"
      data-path="api/appza/v0/license/deactivate"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v0-license-deactivate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v0-license-deactivate"
                    onclick="tryItOut('GETapi-appza-v0-license-deactivate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v0-license-deactivate"
                    onclick="cancelTryOut('GETapi-appza-v0-license-deactivate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v0-license-deactivate"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v0/license/deactivate</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v0-license-deactivate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v0-license-deactivate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="GETapi-appza-v0-license-deactivate"
               value="http://kunze.biz/iste-laborum-eius-est-dolor.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://kunze.biz/iste-laborum-eius-est-dolor.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="GETapi-appza-v0-license-deactivate"
               value="appza"
               data-component="body">
    <br>
<p>Example: <code>appza</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>appza</code></li> <li><code>lazy_task</code></li> <li><code>fcom_mobile</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>appza_action</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="appza_action"                data-endpoint="GETapi-appza-v0-license-deactivate"
               value="plugin_delete"
               data-component="body">
    <br>
<p>Example: <code>plugin_delete</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>license_deactivate</code></li> <li><code>plugin_delete</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="GETapi-appza-v0-license-deactivate"
               value="consequatur"
               data-component="body">
    <br>
<p>This field is required when <code>appza_action</code> is <code>license_deactivate</code>. Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v0-license-version-check">POST api/appza/v0/license/version/check</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v0-license-version-check">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v0/license/version/check" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/license/version/check"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "license_key": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v0-license-version-check">
</span>
<span id="execution-results-POSTapi-appza-v0-license-version-check" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v0-license-version-check"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v0-license-version-check"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v0-license-version-check" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v0-license-version-check">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v0-license-version-check" data-method="POST"
      data-path="api/appza/v0/license/version/check"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v0-license-version-check', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v0-license-version-check"
                    onclick="tryItOut('POSTapi-appza-v0-license-version-check');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v0-license-version-check"
                    onclick="cancelTryOut('POSTapi-appza-v0-license-version-check');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v0-license-version-check"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v0/license/version/check</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v0-license-version-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v0-license-version-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v0-license-version-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v0-app-license-check">GET api/appza/v0/app/license-check</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v0-app-license-check">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v0/app/license-check" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"http:\\/\\/kunze.biz\\/iste-laborum-eius-est-dolor.html\",
    \"product\": \"appza\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/app/license-check"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "http:\/\/kunze.biz\/iste-laborum-eius-est-dolor.html",
    "product": "appza"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v0-app-license-check">
            <blockquote>
            <p>Example response (410):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;API version v0 has been retired.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;,
    &quot;docs_url&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v0-app-license-check" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v0-app-license-check"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v0-app-license-check"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v0-app-license-check" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v0-app-license-check">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v0-app-license-check" data-method="GET"
      data-path="api/appza/v0/app/license-check"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v0-app-license-check', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v0-app-license-check"
                    onclick="tryItOut('GETapi-appza-v0-app-license-check');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v0-app-license-check"
                    onclick="cancelTryOut('GETapi-appza-v0-app-license-check');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v0-app-license-check"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v0/app/license-check</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v0-app-license-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v0-app-license-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="GETapi-appza-v0-app-license-check"
               value="http://kunze.biz/iste-laborum-eius-est-dolor.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://kunze.biz/iste-laborum-eius-est-dolor.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="GETapi-appza-v0-app-license-check"
               value="appza"
               data-component="body">
    <br>
<p>Example: <code>appza</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>appza</code></li> <li><code>lazy_task</code></li> <li><code>fcom_mobile</code></li></ul>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v0-build">POST api/appza/v0/build</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v0-build">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v0/build" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"http:\\/\\/kunze.biz\\/iste-laborum-eius-est-dolor.html\",
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/build"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "http:\/\/kunze.biz\/iste-laborum-eius-est-dolor.html",
    "license_key": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v0-build">
</span>
<span id="execution-results-POSTapi-appza-v0-build" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v0-build"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v0-build"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v0-build" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v0-build">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v0-build" data-method="POST"
      data-path="api/appza/v0/build"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v0-build', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v0-build"
                    onclick="tryItOut('POSTapi-appza-v0-build');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v0-build"
                    onclick="cancelTryOut('POSTapi-appza-v0-build');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v0-build"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v0/build</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v0-build"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v0-build"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v0-build"
               value="http://kunze.biz/iste-laborum-eius-est-dolor.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://kunze.biz/iste-laborum-eius-est-dolor.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v0-build"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v0-build-history">GET api/appza/v0/build/history</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v0-build-history">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v0/build/history" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/build/history"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v0-build-history">
            <blockquote>
            <p>Example response (410):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;API version v0 has been retired.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;,
    &quot;docs_url&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v0-build-history" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v0-build-history"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v0-build-history"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v0-build-history" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v0-build-history">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v0-build-history" data-method="GET"
      data-path="api/appza/v0/build/history"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v0-build-history', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v0-build-history"
                    onclick="tryItOut('GETapi-appza-v0-build-history');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v0-build-history"
                    onclick="cancelTryOut('GETapi-appza-v0-build-history');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v0-build-history"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v0/build/history</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v0-build-history"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v0-build-history"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-appza-v0-build-resource">POST api/appza/v0/build/resource</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v0-build-resource">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v0/build/resource" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"app_name\": \"consequatur\",
    \"app_logo\": \"consequatur\",
    \"app_splash_screen_image\": \"consequatur\",
    \"site_url\": \"https:\\/\\/www.mueller.com\\/laborum-eius-est-dolor-dolores-minus-voluptatem\",
    \"license_key\": \"consequatur\",
    \"email\": \"carolyne.luettgen@example.org\",
    \"plugin_slug\": \"consequatur\",
    \"platform\": []
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/build/resource"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "app_name": "consequatur",
    "app_logo": "consequatur",
    "app_splash_screen_image": "consequatur",
    "site_url": "https:\/\/www.mueller.com\/laborum-eius-est-dolor-dolores-minus-voluptatem",
    "license_key": "consequatur",
    "email": "carolyne.luettgen@example.org",
    "plugin_slug": "consequatur",
    "platform": []
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v0-build-resource">
</span>
<span id="execution-results-POSTapi-appza-v0-build-resource" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v0-build-resource"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v0-build-resource"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v0-build-resource" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v0-build-resource">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v0-build-resource" data-method="POST"
      data-path="api/appza/v0/build/resource"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v0-build-resource', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v0-build-resource"
                    onclick="tryItOut('POSTapi-appza-v0-build-resource');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v0-build-resource"
                    onclick="cancelTryOut('POSTapi-appza-v0-build-resource');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v0-build-resource"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v0/build/resource</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v0-build-resource"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v0-build-resource"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>app_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="app_name"                data-endpoint="POSTapi-appza-v0-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>app_logo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="app_logo"                data-endpoint="POSTapi-appza-v0-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>app_splash_screen_image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="app_splash_screen_image"                data-endpoint="POSTapi-appza-v0-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v0-build-resource"
               value="https://www.mueller.com/laborum-eius-est-dolor-dolores-minus-voluptatem"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>https://www.mueller.com/laborum-eius-est-dolor-dolores-minus-voluptatem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v0-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-appza-v0-build-resource"
               value="carolyne.luettgen@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>carolyne.luettgen@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>plugin_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="plugin_slug"                data-endpoint="POSTapi-appza-v0-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>platform</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="platform"                data-endpoint="POSTapi-appza-v0-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_issuer_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_issuer_id"                data-endpoint="POSTapi-appza-v0-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_key_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_key_id"                data-endpoint="POSTapi-appza-v0-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_p8_file_content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_p8_file_content"                data-endpoint="POSTapi-appza-v0-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_team_id"                data-endpoint="POSTapi-appza-v0-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v0-build-ios-keys-verify">POST api/appza/v0/build/ios-keys-verify</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v0-build-ios-keys-verify">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v0/build/ios-keys-verify" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"consequatur\",
    \"license_key\": \"consequatur\",
    \"ios_issuer_id\": \"consequatur\",
    \"ios_key_id\": \"consequatur\",
    \"ios_p8_file_content\": \"consequatur\",
    \"ios_team_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/build/ios-keys-verify"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "consequatur",
    "license_key": "consequatur",
    "ios_issuer_id": "consequatur",
    "ios_key_id": "consequatur",
    "ios_p8_file_content": "consequatur",
    "ios_team_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v0-build-ios-keys-verify">
</span>
<span id="execution-results-POSTapi-appza-v0-build-ios-keys-verify" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v0-build-ios-keys-verify"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v0-build-ios-keys-verify"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v0-build-ios-keys-verify" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v0-build-ios-keys-verify">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v0-build-ios-keys-verify" data-method="POST"
      data-path="api/appza/v0/build/ios-keys-verify"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v0-build-ios-keys-verify', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v0-build-ios-keys-verify"
                    onclick="tryItOut('POSTapi-appza-v0-build-ios-keys-verify');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v0-build-ios-keys-verify"
                    onclick="cancelTryOut('POSTapi-appza-v0-build-ios-keys-verify');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v0-build-ios-keys-verify"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v0/build/ios-keys-verify</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v0-build-ios-keys-verify"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v0-build-ios-keys-verify"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v0-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v0-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_issuer_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_issuer_id"                data-endpoint="POSTapi-appza-v0-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_key_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_key_id"                data-endpoint="POSTapi-appza-v0-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_p8_file_content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_p8_file_content"                data-endpoint="POSTapi-appza-v0-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_team_id"                data-endpoint="POSTapi-appza-v0-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v0-build-ios-check-app-name">POST api/appza/v0/build/ios-check-app-name</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v0-build-ios-check-app-name">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v0/build/ios-check-app-name" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"http:\\/\\/kunze.biz\\/iste-laborum-eius-est-dolor.html\",
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/build/ios-check-app-name"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "http:\/\/kunze.biz\/iste-laborum-eius-est-dolor.html",
    "license_key": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v0-build-ios-check-app-name">
</span>
<span id="execution-results-POSTapi-appza-v0-build-ios-check-app-name" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v0-build-ios-check-app-name"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v0-build-ios-check-app-name"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v0-build-ios-check-app-name" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v0-build-ios-check-app-name">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v0-build-ios-check-app-name" data-method="POST"
      data-path="api/appza/v0/build/ios-check-app-name"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v0-build-ios-check-app-name', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v0-build-ios-check-app-name"
                    onclick="tryItOut('POSTapi-appza-v0-build-ios-check-app-name');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v0-build-ios-check-app-name"
                    onclick="cancelTryOut('POSTapi-appza-v0-build-ios-check-app-name');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v0-build-ios-check-app-name"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v0/build/ios-check-app-name</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v0-build-ios-check-app-name"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v0-build-ios-check-app-name"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v0-build-ios-check-app-name"
               value="http://kunze.biz/iste-laborum-eius-est-dolor.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://kunze.biz/iste-laborum-eius-est-dolor.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v0-build-ios-check-app-name"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v0-build-response--id-">POST api/appza/v0/build/response/{id}</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v0-build-response--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v0/build/response/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"build_message\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/build/response/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "build_message": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v0-build-response--id-">
</span>
<span id="execution-results-POSTapi-appza-v0-build-response--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v0-build-response--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v0-build-response--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v0-build-response--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v0-build-response--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v0-build-response--id-" data-method="POST"
      data-path="api/appza/v0/build/response/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v0-build-response--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v0-build-response--id-"
                    onclick="tryItOut('POSTapi-appza-v0-build-response--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v0-build-response--id-"
                    onclick="cancelTryOut('POSTapi-appza-v0-build-response--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v0-build-response--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v0/build/response/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v0-build-response--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v0-build-response--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-appza-v0-build-response--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the response. Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>build_message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="build_message"                data-endpoint="POSTapi-appza-v0-build-response--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v0-build-process-start--id-">POST api/appza/v0/build/process-start/{id}</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v0-build-process-start--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v0/build/process-start/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"build_message\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/build/process-start/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "build_message": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v0-build-process-start--id-">
</span>
<span id="execution-results-POSTapi-appza-v0-build-process-start--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v0-build-process-start--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v0-build-process-start--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v0-build-process-start--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v0-build-process-start--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v0-build-process-start--id-" data-method="POST"
      data-path="api/appza/v0/build/process-start/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v0-build-process-start--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v0-build-process-start--id-"
                    onclick="tryItOut('POSTapi-appza-v0-build-process-start--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v0-build-process-start--id-"
                    onclick="cancelTryOut('POSTapi-appza-v0-build-process-start--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v0-build-process-start--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v0/build/process-start/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v0-build-process-start--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v0-build-process-start--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-appza-v0-build-process-start--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the process start. Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>build_message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="build_message"                data-endpoint="POSTapi-appza-v0-build-process-start--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v0-plugins">GET api/appza/v0/plugins</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v0-plugins">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v0/plugins" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/plugins"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v0-plugins">
            <blockquote>
            <p>Example response (410):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;API version v0 has been retired.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;,
    &quot;docs_url&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v0-plugins" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v0-plugins"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v0-plugins"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v0-plugins" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v0-plugins">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v0-plugins" data-method="GET"
      data-path="api/appza/v0/plugins"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v0-plugins', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v0-plugins"
                    onclick="tryItOut('GETapi-appza-v0-plugins');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v0-plugins"
                    onclick="cancelTryOut('GETapi-appza-v0-plugins');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v0-plugins"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v0/plugins</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v0-plugins"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v0-plugins"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v0-plugin-check-disable">GET api/appza/v0/plugin/check-disable</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v0-plugin-check-disable">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v0/plugin/check-disable" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/plugin/check-disable"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v0-plugin-check-disable">
            <blockquote>
            <p>Example response (410):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;API version v0 has been retired.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;,
    &quot;docs_url&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v0-plugin-check-disable" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v0-plugin-check-disable"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v0-plugin-check-disable"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v0-plugin-check-disable" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v0-plugin-check-disable">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v0-plugin-check-disable" data-method="GET"
      data-path="api/appza/v0/plugin/check-disable"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v0-plugin-check-disable', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v0-plugin-check-disable"
                    onclick="tryItOut('GETapi-appza-v0-plugin-check-disable');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v0-plugin-check-disable"
                    onclick="cancelTryOut('GETapi-appza-v0-plugin-check-disable');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v0-plugin-check-disable"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v0/plugin/check-disable</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v0-plugin-check-disable"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v0-plugin-check-disable"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v0-plugin-version-check">GET api/appza/v0/plugin/version-check</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v0-plugin-version-check">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v0/plugin/version-check" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"installed_version\": \"consequatur\",
    \"plugin_slug\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v0/plugin/version-check"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "installed_version": "consequatur",
    "plugin_slug": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v0-plugin-version-check">
            <blockquote>
            <p>Example response (410):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;API version v0 has been retired.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;,
    &quot;docs_url&quot;: &quot;&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v0-plugin-version-check" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v0-plugin-version-check"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v0-plugin-version-check"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v0-plugin-version-check" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v0-plugin-version-check">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v0-plugin-version-check" data-method="GET"
      data-path="api/appza/v0/plugin/version-check"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v0-plugin-version-check', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v0-plugin-version-check"
                    onclick="tryItOut('GETapi-appza-v0-plugin-version-check');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v0-plugin-version-check"
                    onclick="cancelTryOut('GETapi-appza-v0-plugin-version-check');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v0-plugin-version-check"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v0/plugin/version-check</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v0-plugin-version-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v0-plugin-version-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>installed_version</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="installed_version"                data-endpoint="GETapi-appza-v0-plugin-version-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>plugin_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="plugin_slug"                data-endpoint="GETapi-appza-v0-plugin-version-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v1-lead-store--product-">POST api/appza/v1/lead/store/{product}</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v1-lead-store--product-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v1/lead/store/appza|lazy_task|fcom_mobile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first_name\": \"consequatur\",
    \"last_name\": \"consequatur\",
    \"email\": \"carolyne.luettgen@example.org\",
    \"domain\": \"http:\\/\\/www.russel.info\\/minus-voluptatem-quisquam-quibusdam-sed\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/lead/store/appza|lazy_task|fcom_mobile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "consequatur",
    "last_name": "consequatur",
    "email": "carolyne.luettgen@example.org",
    "domain": "http:\/\/www.russel.info\/minus-voluptatem-quisquam-quibusdam-sed"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v1-lead-store--product-">
</span>
<span id="execution-results-POSTapi-appza-v1-lead-store--product-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v1-lead-store--product-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v1-lead-store--product-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v1-lead-store--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v1-lead-store--product-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v1-lead-store--product-" data-method="POST"
      data-path="api/appza/v1/lead/store/{product}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v1-lead-store--product-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v1-lead-store--product-"
                    onclick="tryItOut('POSTapi-appza-v1-lead-store--product-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v1-lead-store--product-"
                    onclick="cancelTryOut('POSTapi-appza-v1-lead-store--product-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v1-lead-store--product-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v1/lead/store/{product}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v1-lead-store--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v1-lead-store--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="POSTapi-appza-v1-lead-store--product-"
               value="appza|lazy_task|fcom_mobile"
               data-component="url">
    <br>
<p>Example: <code>appza|lazy_task|fcom_mobile</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTapi-appza-v1-lead-store--product-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTapi-appza-v1-lead-store--product-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-appza-v1-lead-store--product-"
               value="carolyne.luettgen@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>carolyne.luettgen@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>domain</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="domain"                data-endpoint="POSTapi-appza-v1-lead-store--product-"
               value="http://www.russel.info/minus-voluptatem-quisquam-quibusdam-sed"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.russel.info/minus-voluptatem-quisquam-quibusdam-sed</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v1-themes">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v1-themes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v1/themes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/themes"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v1-themes">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v1
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 404,
    &quot;url&quot;: &quot;http://localhost/api/appza/v1/themes&quot;,
    &quot;method&quot;: &quot;GET&quot;,
    &quot;message&quot;: &quot;Plugin slug must be an array and cannot be empty&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v1-themes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v1-themes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v1-themes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v1-themes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v1-themes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v1-themes" data-method="GET"
      data-path="api/appza/v1/themes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v1-themes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v1-themes"
                    onclick="tryItOut('GETapi-appza-v1-themes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v1-themes"
                    onclick="cancelTryOut('GETapi-appza-v1-themes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v1-themes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v1/themes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v1-themes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v1-themes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v1-themes-get-theme">GET api/appza/v1/themes/get-theme</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v1-themes-get-theme">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v1/themes/get-theme" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/themes/get-theme"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v1-themes-get-theme">
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v1
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 400,
    &quot;url&quot;: &quot;http://localhost/api/appza/v1/themes/get-theme&quot;,
    &quot;method&quot;: &quot;GET&quot;,
    &quot;message&quot;: &quot;Theme slug is required&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v1-themes-get-theme" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v1-themes-get-theme"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v1-themes-get-theme"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v1-themes-get-theme" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v1-themes-get-theme">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v1-themes-get-theme" data-method="GET"
      data-path="api/appza/v1/themes/get-theme"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v1-themes-get-theme', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v1-themes-get-theme"
                    onclick="tryItOut('GETapi-appza-v1-themes-get-theme');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v1-themes-get-theme"
                    onclick="cancelTryOut('GETapi-appza-v1-themes-get-theme');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v1-themes-get-theme"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v1/themes/get-theme</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v1-themes-get-theme"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v1-themes-get-theme"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v1-page-component">GET api/appza/v1/page-component</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v1-page-component">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v1/page-component" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/page-component"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v1-page-component">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v1
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 404,
    &quot;url&quot;: &quot;http://localhost/api/appza/v1/page-component&quot;,
    &quot;method&quot;: &quot;GET&quot;,
    &quot;message&quot;: &quot;Plugin slug must be a non-empty array&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v1-page-component" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v1-page-component"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v1-page-component"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v1-page-component" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v1-page-component">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v1-page-component" data-method="GET"
      data-path="api/appza/v1/page-component"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v1-page-component', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v1-page-component"
                    onclick="tryItOut('GETapi-appza-v1-page-component');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v1-page-component"
                    onclick="cancelTryOut('GETapi-appza-v1-page-component');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v1-page-component"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v1/page-component</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v1-page-component"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v1-page-component"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v1-global-config">GET api/appza/v1/global-config</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v1-global-config">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v1/global-config" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/global-config"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v1-global-config">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: application/json
cache-control: no-cache, private
x-api-version: v1
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 404,
    &quot;url&quot;: &quot;http://localhost/api/appza/v1/global-config&quot;,
    &quot;method&quot;: &quot;GET&quot;,
    &quot;message&quot;: &quot;Plugin slug must be an array and cannot be empty&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v1-global-config" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v1-global-config"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v1-global-config"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v1-global-config" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v1-global-config">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v1-global-config" data-method="GET"
      data-path="api/appza/v1/global-config"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v1-global-config', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v1-global-config"
                    onclick="tryItOut('GETapi-appza-v1-global-config');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v1-global-config"
                    onclick="cancelTryOut('GETapi-appza-v1-global-config');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v1-global-config"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v1/global-config</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v1-global-config"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v1-global-config"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-appza-v1-free-trial--product-">POST api/appza/v1/free/trial/{product}</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v1-free-trial--product-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v1/free/trial/appza|lazy_task|fcom_mobile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"email\": \"carolyne.luettgen@example.org\",
    \"site_url\": \"http:\\/\\/www.russel.info\\/minus-voluptatem-quisquam-quibusdam-sed\",
    \"plugin_slug\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/free/trial/appza|lazy_task|fcom_mobile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "email": "carolyne.luettgen@example.org",
    "site_url": "http:\/\/www.russel.info\/minus-voluptatem-quisquam-quibusdam-sed",
    "plugin_slug": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v1-free-trial--product-">
</span>
<span id="execution-results-POSTapi-appza-v1-free-trial--product-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v1-free-trial--product-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v1-free-trial--product-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v1-free-trial--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v1-free-trial--product-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v1-free-trial--product-" data-method="POST"
      data-path="api/appza/v1/free/trial/{product}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v1-free-trial--product-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v1-free-trial--product-"
                    onclick="tryItOut('POSTapi-appza-v1-free-trial--product-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v1-free-trial--product-"
                    onclick="cancelTryOut('POSTapi-appza-v1-free-trial--product-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v1-free-trial--product-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v1/free/trial/{product}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v1-free-trial--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v1-free-trial--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="POSTapi-appza-v1-free-trial--product-"
               value="appza|lazy_task|fcom_mobile"
               data-component="url">
    <br>
<p>Example: <code>appza|lazy_task|fcom_mobile</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-appza-v1-free-trial--product-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-appza-v1-free-trial--product-"
               value="carolyne.luettgen@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>carolyne.luettgen@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v1-free-trial--product-"
               value="http://www.russel.info/minus-voluptatem-quisquam-quibusdam-sed"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.russel.info/minus-voluptatem-quisquam-quibusdam-sed</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>plugin_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="plugin_slug"                data-endpoint="POSTapi-appza-v1-free-trial--product-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v1-firebase-credential--product-">GET api/appza/v1/firebase/credential/{product}</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v1-firebase-credential--product-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v1/firebase/credential/appza|lazy_task|fcom_mobile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/firebase/credential/appza|lazy_task|fcom_mobile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v1-firebase-credential--product-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Endpoint not found or version retired.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v1-firebase-credential--product-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v1-firebase-credential--product-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v1-firebase-credential--product-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v1-firebase-credential--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v1-firebase-credential--product-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v1-firebase-credential--product-" data-method="GET"
      data-path="api/appza/v1/firebase/credential/{product}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v1-firebase-credential--product-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v1-firebase-credential--product-"
                    onclick="tryItOut('GETapi-appza-v1-firebase-credential--product-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v1-firebase-credential--product-"
                    onclick="cancelTryOut('GETapi-appza-v1-firebase-credential--product-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v1-firebase-credential--product-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v1/firebase/credential/{product}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v1-firebase-credential--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v1-firebase-credential--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="GETapi-appza-v1-firebase-credential--product-"
               value="appza|lazy_task|fcom_mobile"
               data-component="url">
    <br>
<p>Example: <code>appza|lazy_task|fcom_mobile</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-appza-v1-license-check">GET api/appza/v1/license/check</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v1-license-check">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v1/license/check" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"consequatur\",
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/license/check"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "consequatur",
    "license_key": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v1-license-check">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v1
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 401,
    &quot;message&quot;: &quot;Unauthorized&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v1-license-check" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v1-license-check"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v1-license-check"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v1-license-check" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v1-license-check">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v1-license-check" data-method="GET"
      data-path="api/appza/v1/license/check"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v1-license-check', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v1-license-check"
                    onclick="tryItOut('GETapi-appza-v1-license-check');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v1-license-check"
                    onclick="cancelTryOut('GETapi-appza-v1-license-check');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v1-license-check"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v1/license/check</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v1-license-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v1-license-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="GETapi-appza-v1-license-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="GETapi-appza-v1-license-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v1-license-activate">POST api/appza/v1/license/activate</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v1-license-activate">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v1/license/activate" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"consequatur\",
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/license/activate"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "consequatur",
    "license_key": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v1-license-activate">
</span>
<span id="execution-results-POSTapi-appza-v1-license-activate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v1-license-activate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v1-license-activate"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v1-license-activate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v1-license-activate">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v1-license-activate" data-method="POST"
      data-path="api/appza/v1/license/activate"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v1-license-activate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v1-license-activate"
                    onclick="tryItOut('POSTapi-appza-v1-license-activate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v1-license-activate"
                    onclick="cancelTryOut('POSTapi-appza-v1-license-activate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v1-license-activate"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v1/license/activate</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v1-license-activate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v1-license-activate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v1-license-activate"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v1-license-activate"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v1-license-deactivate">GET api/appza/v1/license/deactivate</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v1-license-deactivate">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v1/license/deactivate" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"http:\\/\\/kunze.biz\\/iste-laborum-eius-est-dolor.html\",
    \"product\": \"appza\",
    \"appza_action\": \"license_deactivate\",
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/license/deactivate"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "http:\/\/kunze.biz\/iste-laborum-eius-est-dolor.html",
    "product": "appza",
    "appza_action": "license_deactivate",
    "license_key": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v1-license-deactivate">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v1
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 401,
    &quot;message&quot;: &quot;Unauthorized&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v1-license-deactivate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v1-license-deactivate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v1-license-deactivate"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v1-license-deactivate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v1-license-deactivate">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v1-license-deactivate" data-method="GET"
      data-path="api/appza/v1/license/deactivate"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v1-license-deactivate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v1-license-deactivate"
                    onclick="tryItOut('GETapi-appza-v1-license-deactivate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v1-license-deactivate"
                    onclick="cancelTryOut('GETapi-appza-v1-license-deactivate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v1-license-deactivate"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v1/license/deactivate</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v1-license-deactivate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v1-license-deactivate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="GETapi-appza-v1-license-deactivate"
               value="http://kunze.biz/iste-laborum-eius-est-dolor.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://kunze.biz/iste-laborum-eius-est-dolor.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="GETapi-appza-v1-license-deactivate"
               value="appza"
               data-component="body">
    <br>
<p>Example: <code>appza</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>appza</code></li> <li><code>lazy_task</code></li> <li><code>fcom_mobile</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>appza_action</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="appza_action"                data-endpoint="GETapi-appza-v1-license-deactivate"
               value="license_deactivate"
               data-component="body">
    <br>
<p>Example: <code>license_deactivate</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>license_deactivate</code></li> <li><code>plugin_delete</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="GETapi-appza-v1-license-deactivate"
               value="consequatur"
               data-component="body">
    <br>
<p>This field is required when <code>appza_action</code> is <code>license_deactivate</code>. Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v1-license-version-check">POST api/appza/v1/license/version/check</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v1-license-version-check">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v1/license/version/check" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/license/version/check"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "license_key": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v1-license-version-check">
</span>
<span id="execution-results-POSTapi-appza-v1-license-version-check" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v1-license-version-check"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v1-license-version-check"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v1-license-version-check" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v1-license-version-check">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v1-license-version-check" data-method="POST"
      data-path="api/appza/v1/license/version/check"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v1-license-version-check', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v1-license-version-check"
                    onclick="tryItOut('POSTapi-appza-v1-license-version-check');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v1-license-version-check"
                    onclick="cancelTryOut('POSTapi-appza-v1-license-version-check');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v1-license-version-check"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v1/license/version/check</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v1-license-version-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v1-license-version-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v1-license-version-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v1-app-license-check">GET api/appza/v1/app/license-check</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v1-app-license-check">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v1/app/license-check" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"http:\\/\\/kunze.biz\\/iste-laborum-eius-est-dolor.html\",
    \"product\": \"lazy_task\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/app/license-check"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "http:\/\/kunze.biz\/iste-laborum-eius-est-dolor.html",
    "product": "lazy_task"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v1-app-license-check">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v1
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 404,
    &quot;message&quot;: &quot;Plugin not installed or no license found.&quot;,
    &quot;license_type&quot;: &quot;invalid&quot;,
    &quot;data&quot;: [],
    &quot;popup_message&quot;: [
        {
            &quot;type&quot;: &quot;no_license&quot;,
            &quot;message&quot;: &quot;&lt;p&gt;You do not have a valid licence. Please provide a valid licence key&lt;/p&gt;&quot;
        },
        {
            &quot;type&quot;: &quot;free_trial_grace_admin&quot;,
            &quot;message&quot;: &quot;&lt;p&gt;Your Free Trial will end soon. You can get the full version of LazyTasks App here.&lt;/p&gt;\r\n&lt;div style=\&quot;text-align:center;\&quot;&gt;\r\n  &lt;a href=\&quot;https://lazycoders.co/lazytasks/?product_name=lazy_task\&quot; \r\n     style=\&quot;display:inline-block;\r\n            padding:10px 16px;\r\n            background-color:#1976d2;\r\n            color:#ffffff;\r\n            text-decoration:none;\r\n            border-radius:8px;\r\n            font-weight:bold;\&quot;&gt;\r\n   LazyTasks\r\n  &lt;/a&gt;\r\n&lt;/div&gt;&quot;
        },
        {
            &quot;type&quot;: &quot;free_trial_grace_user&quot;,
            &quot;message&quot;: &quot;&lt;p&gt;The Free Trial period of this app will end soon. Please contact your admin for mobile app access continuity.&lt;/p&gt;&quot;
        },
        {
            &quot;type&quot;: &quot;free_trial_ended_admin&quot;,
            &quot;message&quot;: &quot;&lt;p&gt;Your Free Trial has ended. You can get the full version of LazyTasks App here.&lt;/p&gt;\r\n&lt;div style=\&quot;text-align:center;\&quot;&gt;\r\n  &lt;a href=\&quot;https://lazycoders.co/lazytasks/?product_name=lazy_task\&quot; \r\n     style=\&quot;display:inline-block;\r\n            padding:10px 16px;\r\n            background-color:#1976d2;\r\n            color:#ffffff;\r\n            text-decoration:none;\r\n            border-radius:8px;\r\n            font-weight:bold;\&quot;&gt;\r\n LazyTasks\r\n  &lt;/a&gt;\r\n&lt;/div&gt;&quot;
        },
        {
            &quot;type&quot;: &quot;free_trial_ended_user&quot;,
            &quot;message&quot;: &quot;&lt;p&gt;The Free Trial period of this app has ended. Please contact your  admin for mobile app access.&lt;/p&gt;&quot;
        },
        {
            &quot;type&quot;: &quot;license_expiring_admin&quot;,
            &quot;message&quot;: &quot;&lt;p&gt;Your License for LazyTasks Premium is expiring soon. Please extend your license from LazyCoders customer portal.&lt;/p&gt;\r\n&lt;div style=\&quot;text-align:center;\&quot;&gt;\r\n  &lt;a href=\&quot;https://lazycoders.co/customer-portal/\&quot; \r\n     style=\&quot;display:inline-block;\r\n            padding:10px 16px;\r\n            background-color:#1976d2;\r\n            color:#ffffff;\r\n            text-decoration:none;\r\n            border-radius:8px;\r\n            font-weight:bold;\&quot;&gt;\r\n Customer Portal\r\n  &lt;/a&gt;\r\n&lt;/div&gt;&quot;
        },
        {
            &quot;type&quot;: &quot;license_expired_grace_admin&quot;,
            &quot;message&quot;: &quot;&lt;p&gt;Your License for LazyTasks  has expired. Please extend your license from LazyCoders customer portal.&lt;/p&gt;\r\n&lt;div style=\&quot;text-align:center;\&quot;&gt;\r\n  &lt;a href=\&quot;https://lazycoders.co/customer-portal/\&quot; \r\n     style=\&quot;display:inline-block;\r\n            padding:10px 16px;\r\n            background-color:#1976d2;\r\n            color:#ffffff;\r\n            text-decoration:none;\r\n            border-radius:8px;\r\n            font-weight:bold;\&quot;&gt;\r\n  Customer Portal\r\n  &lt;/a&gt;\r\n&lt;/div&gt;&quot;
        },
        {
            &quot;type&quot;: &quot;license_expired_grace_user&quot;,
            &quot;message&quot;: &quot;&lt;p&gt;License has expired for LazyTasks Premium. App access will be revoked soon. Please contact your  admin.&lt;/p&gt;&quot;
        },
        {
            &quot;type&quot;: &quot;license_expired_final_admin&quot;,
            &quot;message&quot;: &quot;&lt;p&gt;Your License for LazyTasks Premium has expired. Please extend your license from LazyCoders customer portal.&lt;/p&gt;\r\n&lt;div style=\&quot;text-align:center;\&quot;&gt;\r\n  &lt;a href=\&quot;https://lazycoders.co/customer-portal/\&quot; \r\n     style=\&quot;display:inline-block;\r\n            padding:10px 16px;\r\n            background-color:#1976d2;\r\n            color:#ffffff;\r\n            text-decoration:none;\r\n            border-radius:8px;\r\n            font-weight:bold;\&quot;&gt;\r\n Customer Portal\r\n  &lt;/a&gt;\r\n&lt;/div&gt;&quot;
        },
        {
            &quot;type&quot;: &quot;license_expired_final_user&quot;,
            &quot;message&quot;: &quot;&lt;p&gt;Access restricted due to expired license. Please contact your  admin.&lt;/p&gt;&quot;
        }
    ]
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v1-app-license-check" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v1-app-license-check"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v1-app-license-check"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v1-app-license-check" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v1-app-license-check">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v1-app-license-check" data-method="GET"
      data-path="api/appza/v1/app/license-check"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v1-app-license-check', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v1-app-license-check"
                    onclick="tryItOut('GETapi-appza-v1-app-license-check');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v1-app-license-check"
                    onclick="cancelTryOut('GETapi-appza-v1-app-license-check');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v1-app-license-check"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v1/app/license-check</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v1-app-license-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v1-app-license-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="GETapi-appza-v1-app-license-check"
               value="http://kunze.biz/iste-laborum-eius-est-dolor.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://kunze.biz/iste-laborum-eius-est-dolor.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="GETapi-appza-v1-app-license-check"
               value="lazy_task"
               data-component="body">
    <br>
<p>Example: <code>lazy_task</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>appza</code></li> <li><code>lazy_task</code></li> <li><code>fcom_mobile</code></li></ul>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v1-build-resource">POST api/appza/v1/build/resource</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v1-build-resource">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v1/build/resource" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"app_name\": \"consequatur\",
    \"app_logo\": \"consequatur\",
    \"app_splash_screen_image\": \"consequatur\",
    \"site_url\": \"https:\\/\\/www.mueller.com\\/laborum-eius-est-dolor-dolores-minus-voluptatem\",
    \"license_key\": \"consequatur\",
    \"email\": \"carolyne.luettgen@example.org\",
    \"plugin_slug\": \"consequatur\",
    \"platform\": []
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/build/resource"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "app_name": "consequatur",
    "app_logo": "consequatur",
    "app_splash_screen_image": "consequatur",
    "site_url": "https:\/\/www.mueller.com\/laborum-eius-est-dolor-dolores-minus-voluptatem",
    "license_key": "consequatur",
    "email": "carolyne.luettgen@example.org",
    "plugin_slug": "consequatur",
    "platform": []
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v1-build-resource">
</span>
<span id="execution-results-POSTapi-appza-v1-build-resource" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v1-build-resource"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v1-build-resource"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v1-build-resource" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v1-build-resource">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v1-build-resource" data-method="POST"
      data-path="api/appza/v1/build/resource"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v1-build-resource', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v1-build-resource"
                    onclick="tryItOut('POSTapi-appza-v1-build-resource');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v1-build-resource"
                    onclick="cancelTryOut('POSTapi-appza-v1-build-resource');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v1-build-resource"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v1/build/resource</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v1-build-resource"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v1-build-resource"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>app_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="app_name"                data-endpoint="POSTapi-appza-v1-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>app_logo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="app_logo"                data-endpoint="POSTapi-appza-v1-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>app_splash_screen_image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="app_splash_screen_image"                data-endpoint="POSTapi-appza-v1-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v1-build-resource"
               value="https://www.mueller.com/laborum-eius-est-dolor-dolores-minus-voluptatem"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>https://www.mueller.com/laborum-eius-est-dolor-dolores-minus-voluptatem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v1-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-appza-v1-build-resource"
               value="carolyne.luettgen@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>carolyne.luettgen@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>plugin_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="plugin_slug"                data-endpoint="POSTapi-appza-v1-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>platform</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="platform"                data-endpoint="POSTapi-appza-v1-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_issuer_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_issuer_id"                data-endpoint="POSTapi-appza-v1-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_key_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_key_id"                data-endpoint="POSTapi-appza-v1-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_p8_file_content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_p8_file_content"                data-endpoint="POSTapi-appza-v1-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_team_id"                data-endpoint="POSTapi-appza-v1-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v1-build-ios-keys-verify">POST api/appza/v1/build/ios-keys-verify</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v1-build-ios-keys-verify">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v1/build/ios-keys-verify" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"consequatur\",
    \"license_key\": \"consequatur\",
    \"ios_issuer_id\": \"consequatur\",
    \"ios_key_id\": \"consequatur\",
    \"ios_p8_file_content\": \"consequatur\",
    \"ios_team_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/build/ios-keys-verify"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "consequatur",
    "license_key": "consequatur",
    "ios_issuer_id": "consequatur",
    "ios_key_id": "consequatur",
    "ios_p8_file_content": "consequatur",
    "ios_team_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v1-build-ios-keys-verify">
</span>
<span id="execution-results-POSTapi-appza-v1-build-ios-keys-verify" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v1-build-ios-keys-verify"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v1-build-ios-keys-verify"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v1-build-ios-keys-verify" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v1-build-ios-keys-verify">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v1-build-ios-keys-verify" data-method="POST"
      data-path="api/appza/v1/build/ios-keys-verify"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v1-build-ios-keys-verify', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v1-build-ios-keys-verify"
                    onclick="tryItOut('POSTapi-appza-v1-build-ios-keys-verify');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v1-build-ios-keys-verify"
                    onclick="cancelTryOut('POSTapi-appza-v1-build-ios-keys-verify');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v1-build-ios-keys-verify"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v1/build/ios-keys-verify</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v1-build-ios-keys-verify"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v1-build-ios-keys-verify"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v1-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v1-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_issuer_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_issuer_id"                data-endpoint="POSTapi-appza-v1-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_key_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_key_id"                data-endpoint="POSTapi-appza-v1-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_p8_file_content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_p8_file_content"                data-endpoint="POSTapi-appza-v1-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_team_id"                data-endpoint="POSTapi-appza-v1-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v1-build">POST api/appza/v1/build</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v1-build">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v1/build" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"http:\\/\\/kunze.biz\\/iste-laborum-eius-est-dolor.html\",
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/build"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "http:\/\/kunze.biz\/iste-laborum-eius-est-dolor.html",
    "license_key": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v1-build">
</span>
<span id="execution-results-POSTapi-appza-v1-build" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v1-build"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v1-build"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v1-build" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v1-build">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v1-build" data-method="POST"
      data-path="api/appza/v1/build"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v1-build', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v1-build"
                    onclick="tryItOut('POSTapi-appza-v1-build');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v1-build"
                    onclick="cancelTryOut('POSTapi-appza-v1-build');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v1-build"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v1/build</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v1-build"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v1-build"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v1-build"
               value="http://kunze.biz/iste-laborum-eius-est-dolor.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://kunze.biz/iste-laborum-eius-est-dolor.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v1-build"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v1-build-history">GET api/appza/v1/build/history</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v1-build-history">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v1/build/history" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/build/history"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v1-build-history">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: application/json
cache-control: no-cache, private
x-api-version: v1
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 401,
    &quot;message&quot;: &quot;Unauthorized&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v1-build-history" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v1-build-history"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v1-build-history"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v1-build-history" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v1-build-history">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v1-build-history" data-method="GET"
      data-path="api/appza/v1/build/history"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v1-build-history', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v1-build-history"
                    onclick="tryItOut('GETapi-appza-v1-build-history');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v1-build-history"
                    onclick="cancelTryOut('GETapi-appza-v1-build-history');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v1-build-history"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v1/build/history</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v1-build-history"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v1-build-history"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-appza-v1-build-ios-check-app-name">POST api/appza/v1/build/ios-check-app-name</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v1-build-ios-check-app-name">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v1/build/ios-check-app-name" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"http:\\/\\/kunze.biz\\/iste-laborum-eius-est-dolor.html\",
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/build/ios-check-app-name"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "http:\/\/kunze.biz\/iste-laborum-eius-est-dolor.html",
    "license_key": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v1-build-ios-check-app-name">
</span>
<span id="execution-results-POSTapi-appza-v1-build-ios-check-app-name" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v1-build-ios-check-app-name"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v1-build-ios-check-app-name"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v1-build-ios-check-app-name" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v1-build-ios-check-app-name">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v1-build-ios-check-app-name" data-method="POST"
      data-path="api/appza/v1/build/ios-check-app-name"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v1-build-ios-check-app-name', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v1-build-ios-check-app-name"
                    onclick="tryItOut('POSTapi-appza-v1-build-ios-check-app-name');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v1-build-ios-check-app-name"
                    onclick="cancelTryOut('POSTapi-appza-v1-build-ios-check-app-name');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v1-build-ios-check-app-name"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v1/build/ios-check-app-name</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v1-build-ios-check-app-name"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v1-build-ios-check-app-name"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v1-build-ios-check-app-name"
               value="http://kunze.biz/iste-laborum-eius-est-dolor.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://kunze.biz/iste-laborum-eius-est-dolor.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v1-build-ios-check-app-name"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v1-build-response--id-">POST api/appza/v1/build/response/{id}</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v1-build-response--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v1/build/response/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"build_message\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/build/response/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "build_message": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v1-build-response--id-">
</span>
<span id="execution-results-POSTapi-appza-v1-build-response--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v1-build-response--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v1-build-response--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v1-build-response--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v1-build-response--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v1-build-response--id-" data-method="POST"
      data-path="api/appza/v1/build/response/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v1-build-response--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v1-build-response--id-"
                    onclick="tryItOut('POSTapi-appza-v1-build-response--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v1-build-response--id-"
                    onclick="cancelTryOut('POSTapi-appza-v1-build-response--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v1-build-response--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v1/build/response/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v1-build-response--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v1-build-response--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-appza-v1-build-response--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the response. Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>build_message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="build_message"                data-endpoint="POSTapi-appza-v1-build-response--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v1-build-process-start--id-">POST api/appza/v1/build/process-start/{id}</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v1-build-process-start--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v1/build/process-start/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"build_message\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/build/process-start/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "build_message": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v1-build-process-start--id-">
</span>
<span id="execution-results-POSTapi-appza-v1-build-process-start--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v1-build-process-start--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v1-build-process-start--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v1-build-process-start--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v1-build-process-start--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v1-build-process-start--id-" data-method="POST"
      data-path="api/appza/v1/build/process-start/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v1-build-process-start--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v1-build-process-start--id-"
                    onclick="tryItOut('POSTapi-appza-v1-build-process-start--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v1-build-process-start--id-"
                    onclick="cancelTryOut('POSTapi-appza-v1-build-process-start--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v1-build-process-start--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v1/build/process-start/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v1-build-process-start--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v1-build-process-start--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-appza-v1-build-process-start--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the process start. Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>build_message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="build_message"                data-endpoint="POSTapi-appza-v1-build-process-start--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v1-plugins">GET api/appza/v1/plugins</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v1-plugins">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v1/plugins" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/plugins"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v1-plugins">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v1
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Wordpress&quot;,
            &quot;slug&quot;: &quot;wordpress&quot;,
            &quot;prefix&quot;: &quot;WP_&quot;,
            &quot;title&quot;: null,
            &quot;description&quot;: null,
            &quot;others&quot;: null,
            &quot;created&quot;: &quot;08-Dec-2024&quot;,
            &quot;is_disable&quot;: false,
            &quot;image&quot;: &quot;https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/ddzuCEwl9MvmQzsSNEuW79kyodZx53fsjZ5WJ6ig.png&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Woocommerce&quot;,
            &quot;slug&quot;: &quot;woocommerce&quot;,
            &quot;prefix&quot;: &quot;Woo_&quot;,
            &quot;title&quot;: null,
            &quot;description&quot;: null,
            &quot;others&quot;: null,
            &quot;created&quot;: &quot;08-Dec-2024&quot;,
            &quot;is_disable&quot;: false,
            &quot;image&quot;: &quot;https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/NDeIlDIhqEwi2leoHFBsbiRfj1L4IME1pgpmScVo.png&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Tutor LMS&quot;,
            &quot;slug&quot;: &quot;tutor-lms&quot;,
            &quot;prefix&quot;: &quot;TLMS_&quot;,
            &quot;title&quot;: null,
            &quot;description&quot;: null,
            &quot;others&quot;: null,
            &quot;created&quot;: &quot;08-Dec-2024&quot;,
            &quot;is_disable&quot;: true,
            &quot;image&quot;: &quot;https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/E6QoV7rguGrLydmlkp5cskNhYrQ6Z3zigZgf2sWk.png&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Fluent Community&quot;,
            &quot;slug&quot;: &quot;fluent-community&quot;,
            &quot;prefix&quot;: &quot;FCommunity_&quot;,
            &quot;title&quot;: null,
            &quot;description&quot;: null,
            &quot;others&quot;: null,
            &quot;created&quot;: &quot;08-Dec-2024&quot;,
            &quot;is_disable&quot;: true,
            &quot;image&quot;: &quot;https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/j1r8UqnkWrYtbWw0rzepVxDOmi5Jm4L73I8S8I47.png&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Lazy Tasks&quot;,
            &quot;slug&quot;: &quot;lazy-tasks&quot;,
            &quot;prefix&quot;: &quot;LTasks_&quot;,
            &quot;title&quot;: null,
            &quot;description&quot;: null,
            &quot;others&quot;: null,
            &quot;created&quot;: &quot;08-Dec-2024&quot;,
            &quot;is_disable&quot;: true,
            &quot;image&quot;: &quot;https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/FdFf6iG6jLEXg6WEcjDQ57cWurCUnGVyYQDyBOP7.png&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Learn Dash&quot;,
            &quot;slug&quot;: &quot;learn-dash&quot;,
            &quot;prefix&quot;: &quot;LDash_&quot;,
            &quot;title&quot;: null,
            &quot;description&quot;: null,
            &quot;others&quot;: null,
            &quot;created&quot;: &quot;08-Dec-2024&quot;,
            &quot;is_disable&quot;: true,
            &quot;image&quot;: &quot;https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/an8e0k8Pop1PhsYWlGrJvfmMeyMfcnedW3Ka1xSF.png&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Lifter LMS&quot;,
            &quot;slug&quot;: &quot;lifter-lms&quot;,
            &quot;prefix&quot;: &quot;LLMS_&quot;,
            &quot;title&quot;: null,
            &quot;description&quot;: null,
            &quot;others&quot;: null,
            &quot;created&quot;: &quot;08-Dec-2024&quot;,
            &quot;is_disable&quot;: true,
            &quot;image&quot;: &quot;https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/6581UcKX7vSqAAJzNrPro9CbdEBPZZvLauMAouu9.png&quot;
        }
    ],
    &quot;status&quot;: 200,
    &quot;url&quot;: &quot;http://localhost/api/appza/v1/plugins&quot;,
    &quot;method&quot;: &quot;GET&quot;,
    &quot;message&quot;: &quot;Data Found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v1-plugins" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v1-plugins"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v1-plugins"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v1-plugins" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v1-plugins">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v1-plugins" data-method="GET"
      data-path="api/appza/v1/plugins"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v1-plugins', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v1-plugins"
                    onclick="tryItOut('GETapi-appza-v1-plugins');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v1-plugins"
                    onclick="cancelTryOut('GETapi-appza-v1-plugins');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v1-plugins"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v1/plugins</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v1-plugins"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v1-plugins"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v1-plugin-check-disable">GET api/appza/v1/plugin/check-disable</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v1-plugin-check-disable">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v1/plugin/check-disable" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/plugin/check-disable"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v1-plugin-check-disable">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: application/json
cache-control: no-cache, private
x-api-version: v1
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 404,
    &quot;url&quot;: &quot;http://localhost/api/appza/v1/plugin/check-disable&quot;,
    &quot;method&quot;: &quot;GET&quot;,
    &quot;message&quot;: &quot;Data Not Found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v1-plugin-check-disable" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v1-plugin-check-disable"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v1-plugin-check-disable"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v1-plugin-check-disable" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v1-plugin-check-disable">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v1-plugin-check-disable" data-method="GET"
      data-path="api/appza/v1/plugin/check-disable"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v1-plugin-check-disable', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v1-plugin-check-disable"
                    onclick="tryItOut('GETapi-appza-v1-plugin-check-disable');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v1-plugin-check-disable"
                    onclick="cancelTryOut('GETapi-appza-v1-plugin-check-disable');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v1-plugin-check-disable"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v1/plugin/check-disable</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v1-plugin-check-disable"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v1-plugin-check-disable"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v1-plugin-install-latest-version">GET api/appza/v1/plugin/install-latest-version</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v1-plugin-install-latest-version">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v1/plugin/install-latest-version" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"plugin_slug\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/plugin/install-latest-version"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "plugin_slug": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v1-plugin-install-latest-version">
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v1
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 400,
    &quot;message&quot;: &quot;Validation Error&quot;,
    &quot;errors&quot;: {
        &quot;plugin_slug&quot;: [
            &quot;The selected plugin slug is invalid.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v1-plugin-install-latest-version" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v1-plugin-install-latest-version"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v1-plugin-install-latest-version"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v1-plugin-install-latest-version" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v1-plugin-install-latest-version">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v1-plugin-install-latest-version" data-method="GET"
      data-path="api/appza/v1/plugin/install-latest-version"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v1-plugin-install-latest-version', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v1-plugin-install-latest-version"
                    onclick="tryItOut('GETapi-appza-v1-plugin-install-latest-version');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v1-plugin-install-latest-version"
                    onclick="cancelTryOut('GETapi-appza-v1-plugin-install-latest-version');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v1-plugin-install-latest-version"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v1/plugin/install-latest-version</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v1-plugin-install-latest-version"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v1-plugin-install-latest-version"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>plugin_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="plugin_slug"                data-endpoint="GETapi-appza-v1-plugin-install-latest-version"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v1-plugin-version-check">GET api/appza/v1/plugin/version-check</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v1-plugin-version-check">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v1/plugin/version-check" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"installed_version\": \"consequatur\",
    \"plugin_slug\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v1/plugin/version-check"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "installed_version": "consequatur",
    "plugin_slug": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v1-plugin-version-check">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v1
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 404,
    &quot;message&quot;: &quot;Plugin not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v1-plugin-version-check" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v1-plugin-version-check"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v1-plugin-version-check"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v1-plugin-version-check" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v1-plugin-version-check">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v1-plugin-version-check" data-method="GET"
      data-path="api/appza/v1/plugin/version-check"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v1-plugin-version-check', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v1-plugin-version-check"
                    onclick="tryItOut('GETapi-appza-v1-plugin-version-check');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v1-plugin-version-check"
                    onclick="cancelTryOut('GETapi-appza-v1-plugin-version-check');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v1-plugin-version-check"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v1/plugin/version-check</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v1-plugin-version-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v1-plugin-version-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>installed_version</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="installed_version"                data-endpoint="GETapi-appza-v1-plugin-version-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>plugin_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="plugin_slug"                data-endpoint="GETapi-appza-v1-plugin-version-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v2-lead-store--product-">POST api/appza/v2/lead/store/{product}</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v2-lead-store--product-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v2/lead/store/appza|lazy_task|fcom_mobile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"first_name\": \"consequatur\",
    \"last_name\": \"consequatur\",
    \"email\": \"carolyne.luettgen@example.org\",
    \"domain\": \"http:\\/\\/www.russel.info\\/minus-voluptatem-quisquam-quibusdam-sed\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/lead/store/appza|lazy_task|fcom_mobile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "first_name": "consequatur",
    "last_name": "consequatur",
    "email": "carolyne.luettgen@example.org",
    "domain": "http:\/\/www.russel.info\/minus-voluptatem-quisquam-quibusdam-sed"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v2-lead-store--product-">
</span>
<span id="execution-results-POSTapi-appza-v2-lead-store--product-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v2-lead-store--product-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v2-lead-store--product-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v2-lead-store--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v2-lead-store--product-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v2-lead-store--product-" data-method="POST"
      data-path="api/appza/v2/lead/store/{product}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v2-lead-store--product-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v2-lead-store--product-"
                    onclick="tryItOut('POSTapi-appza-v2-lead-store--product-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v2-lead-store--product-"
                    onclick="cancelTryOut('POSTapi-appza-v2-lead-store--product-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v2-lead-store--product-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v2/lead/store/{product}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v2-lead-store--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v2-lead-store--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="POSTapi-appza-v2-lead-store--product-"
               value="appza|lazy_task|fcom_mobile"
               data-component="url">
    <br>
<p>Example: <code>appza|lazy_task|fcom_mobile</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>first_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="first_name"                data-endpoint="POSTapi-appza-v2-lead-store--product-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>last_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="last_name"                data-endpoint="POSTapi-appza-v2-lead-store--product-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-appza-v2-lead-store--product-"
               value="carolyne.luettgen@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>carolyne.luettgen@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>domain</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="domain"                data-endpoint="POSTapi-appza-v2-lead-store--product-"
               value="http://www.russel.info/minus-voluptatem-quisquam-quibusdam-sed"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.russel.info/minus-voluptatem-quisquam-quibusdam-sed</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v2-themes">Display a listing of the resource.</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v2-themes">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v2/themes" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/themes"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v2-themes">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v2
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 404,
    &quot;url&quot;: &quot;http://localhost/api/appza/v2/themes&quot;,
    &quot;method&quot;: &quot;GET&quot;,
    &quot;message&quot;: &quot;Plugin slug must be an array and cannot be empty&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v2-themes" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v2-themes"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v2-themes"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v2-themes" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v2-themes">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v2-themes" data-method="GET"
      data-path="api/appza/v2/themes"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v2-themes', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v2-themes"
                    onclick="tryItOut('GETapi-appza-v2-themes');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v2-themes"
                    onclick="cancelTryOut('GETapi-appza-v2-themes');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v2-themes"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v2/themes</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v2-themes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v2-themes"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v2-themes-get-theme">GET api/appza/v2/themes/get-theme</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v2-themes-get-theme">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v2/themes/get-theme" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/themes/get-theme"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v2-themes-get-theme">
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v2
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 400,
    &quot;url&quot;: &quot;http://localhost/api/appza/v2/themes/get-theme&quot;,
    &quot;method&quot;: &quot;GET&quot;,
    &quot;message&quot;: &quot;Theme slug is required&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v2-themes-get-theme" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v2-themes-get-theme"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v2-themes-get-theme"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v2-themes-get-theme" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v2-themes-get-theme">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v2-themes-get-theme" data-method="GET"
      data-path="api/appza/v2/themes/get-theme"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v2-themes-get-theme', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v2-themes-get-theme"
                    onclick="tryItOut('GETapi-appza-v2-themes-get-theme');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v2-themes-get-theme"
                    onclick="cancelTryOut('GETapi-appza-v2-themes-get-theme');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v2-themes-get-theme"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v2/themes/get-theme</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v2-themes-get-theme"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v2-themes-get-theme"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v2-page-component">GET api/appza/v2/page-component</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v2-page-component">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v2/page-component" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/page-component"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v2-page-component">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v2
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 404,
    &quot;url&quot;: &quot;http://localhost/api/appza/v2/page-component&quot;,
    &quot;method&quot;: &quot;GET&quot;,
    &quot;message&quot;: &quot;Plugin slug must be a non-empty array&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v2-page-component" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v2-page-component"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v2-page-component"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v2-page-component" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v2-page-component">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v2-page-component" data-method="GET"
      data-path="api/appza/v2/page-component"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v2-page-component', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v2-page-component"
                    onclick="tryItOut('GETapi-appza-v2-page-component');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v2-page-component"
                    onclick="cancelTryOut('GETapi-appza-v2-page-component');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v2-page-component"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v2/page-component</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v2-page-component"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v2-page-component"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v2-global-config">GET api/appza/v2/global-config</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v2-global-config">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v2/global-config" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/global-config"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v2-global-config">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: application/json
cache-control: no-cache, private
x-api-version: v2
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 404,
    &quot;url&quot;: &quot;http://localhost/api/appza/v2/global-config&quot;,
    &quot;method&quot;: &quot;GET&quot;,
    &quot;message&quot;: &quot;Plugin slug must be an array and cannot be empty&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v2-global-config" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v2-global-config"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v2-global-config"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v2-global-config" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v2-global-config">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v2-global-config" data-method="GET"
      data-path="api/appza/v2/global-config"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v2-global-config', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v2-global-config"
                    onclick="tryItOut('GETapi-appza-v2-global-config');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v2-global-config"
                    onclick="cancelTryOut('GETapi-appza-v2-global-config');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v2-global-config"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v2/global-config</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v2-global-config"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v2-global-config"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-appza-v2-free-trial--product-">POST api/appza/v2/free/trial/{product}</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v2-free-trial--product-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v2/free/trial/appza|lazy_task|fcom_mobile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"name\": \"consequatur\",
    \"email\": \"carolyne.luettgen@example.org\",
    \"site_url\": \"http:\\/\\/www.russel.info\\/minus-voluptatem-quisquam-quibusdam-sed\",
    \"plugin_slug\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/free/trial/appza|lazy_task|fcom_mobile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "name": "consequatur",
    "email": "carolyne.luettgen@example.org",
    "site_url": "http:\/\/www.russel.info\/minus-voluptatem-quisquam-quibusdam-sed",
    "plugin_slug": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v2-free-trial--product-">
</span>
<span id="execution-results-POSTapi-appza-v2-free-trial--product-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v2-free-trial--product-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v2-free-trial--product-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v2-free-trial--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v2-free-trial--product-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v2-free-trial--product-" data-method="POST"
      data-path="api/appza/v2/free/trial/{product}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v2-free-trial--product-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v2-free-trial--product-"
                    onclick="tryItOut('POSTapi-appza-v2-free-trial--product-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v2-free-trial--product-"
                    onclick="cancelTryOut('POSTapi-appza-v2-free-trial--product-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v2-free-trial--product-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v2/free/trial/{product}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v2-free-trial--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v2-free-trial--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="POSTapi-appza-v2-free-trial--product-"
               value="appza|lazy_task|fcom_mobile"
               data-component="url">
    <br>
<p>Example: <code>appza|lazy_task|fcom_mobile</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="name"                data-endpoint="POSTapi-appza-v2-free-trial--product-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-appza-v2-free-trial--product-"
               value="carolyne.luettgen@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>carolyne.luettgen@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v2-free-trial--product-"
               value="http://www.russel.info/minus-voluptatem-quisquam-quibusdam-sed"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://www.russel.info/minus-voluptatem-quisquam-quibusdam-sed</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>plugin_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="plugin_slug"                data-endpoint="POSTapi-appza-v2-free-trial--product-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v2-firebase-credential--product-">GET api/appza/v2/firebase/credential/{product}</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v2-firebase-credential--product-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v2/firebase/credential/appza|lazy_task|fcom_mobile" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/firebase/credential/appza|lazy_task|fcom_mobile"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v2-firebase-credential--product-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Endpoint not found or version retired.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v2-firebase-credential--product-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v2-firebase-credential--product-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v2-firebase-credential--product-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v2-firebase-credential--product-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v2-firebase-credential--product-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v2-firebase-credential--product-" data-method="GET"
      data-path="api/appza/v2/firebase/credential/{product}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v2-firebase-credential--product-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v2-firebase-credential--product-"
                    onclick="tryItOut('GETapi-appza-v2-firebase-credential--product-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v2-firebase-credential--product-"
                    onclick="cancelTryOut('GETapi-appza-v2-firebase-credential--product-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v2-firebase-credential--product-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v2/firebase/credential/{product}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v2-firebase-credential--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v2-firebase-credential--product-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="GETapi-appza-v2-firebase-credential--product-"
               value="appza|lazy_task|fcom_mobile"
               data-component="url">
    <br>
<p>Example: <code>appza|lazy_task|fcom_mobile</code></p>
            </div>
                    </form>

                    <h2 id="endpoints-GETapi-appza-v2-license-check">GET api/appza/v2/license/check</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v2-license-check">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v2/license/check" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"http:\\/\\/kunze.biz\\/iste-laborum-eius-est-dolor.html\",
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/license/check"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "http:\/\/kunze.biz\/iste-laborum-eius-est-dolor.html",
    "license_key": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v2-license-check">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v2
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v2-license-check" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v2-license-check"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v2-license-check"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v2-license-check" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v2-license-check">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v2-license-check" data-method="GET"
      data-path="api/appza/v2/license/check"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v2-license-check', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v2-license-check"
                    onclick="tryItOut('GETapi-appza-v2-license-check');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v2-license-check"
                    onclick="cancelTryOut('GETapi-appza-v2-license-check');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v2-license-check"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v2/license/check</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v2-license-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v2-license-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="GETapi-appza-v2-license-check"
               value="http://kunze.biz/iste-laborum-eius-est-dolor.html"
               data-component="body">
    <br>
<p>Example: <code>http://kunze.biz/iste-laborum-eius-est-dolor.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="GETapi-appza-v2-license-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v2-license-activate">POST api/appza/v2/license/activate</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v2-license-activate">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v2/license/activate" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"http:\\/\\/kunze.biz\\/iste-laborum-eius-est-dolor.html\",
    \"license_key\": \"consequatur\",
    \"email\": \"carolyne.luettgen@example.org\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/license/activate"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "http:\/\/kunze.biz\/iste-laborum-eius-est-dolor.html",
    "license_key": "consequatur",
    "email": "carolyne.luettgen@example.org"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v2-license-activate">
</span>
<span id="execution-results-POSTapi-appza-v2-license-activate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v2-license-activate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v2-license-activate"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v2-license-activate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v2-license-activate">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v2-license-activate" data-method="POST"
      data-path="api/appza/v2/license/activate"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v2-license-activate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v2-license-activate"
                    onclick="tryItOut('POSTapi-appza-v2-license-activate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v2-license-activate"
                    onclick="cancelTryOut('POSTapi-appza-v2-license-activate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v2-license-activate"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v2/license/activate</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v2-license-activate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v2-license-activate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v2-license-activate"
               value="http://kunze.biz/iste-laborum-eius-est-dolor.html"
               data-component="body">
    <br>
<p>Example: <code>http://kunze.biz/iste-laborum-eius-est-dolor.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v2-license-activate"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-appza-v2-license-activate"
               value="carolyne.luettgen@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>carolyne.luettgen@example.org</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v2-license-deactivate">GET api/appza/v2/license/deactivate</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v2-license-deactivate">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v2/license/deactivate" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"http:\\/\\/kunze.biz\\/iste-laborum-eius-est-dolor.html\",
    \"product\": \"appza\",
    \"appza_action\": \"plugin_delete\",
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/license/deactivate"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "http:\/\/kunze.biz\/iste-laborum-eius-est-dolor.html",
    "product": "appza",
    "appza_action": "plugin_delete",
    "license_key": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v2-license-deactivate">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v2
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 401,
    &quot;message&quot;: &quot;Unauthorized&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v2-license-deactivate" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v2-license-deactivate"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v2-license-deactivate"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v2-license-deactivate" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v2-license-deactivate">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v2-license-deactivate" data-method="GET"
      data-path="api/appza/v2/license/deactivate"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v2-license-deactivate', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v2-license-deactivate"
                    onclick="tryItOut('GETapi-appza-v2-license-deactivate');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v2-license-deactivate"
                    onclick="cancelTryOut('GETapi-appza-v2-license-deactivate');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v2-license-deactivate"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v2/license/deactivate</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v2-license-deactivate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v2-license-deactivate"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="GETapi-appza-v2-license-deactivate"
               value="http://kunze.biz/iste-laborum-eius-est-dolor.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://kunze.biz/iste-laborum-eius-est-dolor.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="GETapi-appza-v2-license-deactivate"
               value="appza"
               data-component="body">
    <br>
<p>Example: <code>appza</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>appza</code></li> <li><code>lazy_task</code></li> <li><code>fcom_mobile</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>appza_action</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="appza_action"                data-endpoint="GETapi-appza-v2-license-deactivate"
               value="plugin_delete"
               data-component="body">
    <br>
<p>Example: <code>plugin_delete</code></p>
Must be one of:
<ul style="list-style-type: square;"><li><code>license_deactivate</code></li> <li><code>plugin_delete</code></li></ul>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="GETapi-appza-v2-license-deactivate"
               value="consequatur"
               data-component="body">
    <br>
<p>This field is required when <code>appza_action</code> is <code>license_deactivate</code>. Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v2-license-version-check">POST api/appza/v2/license/version/check</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v2-license-version-check">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v2/license/version/check" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/license/version/check"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "license_key": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v2-license-version-check">
</span>
<span id="execution-results-POSTapi-appza-v2-license-version-check" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v2-license-version-check"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v2-license-version-check"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v2-license-version-check" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v2-license-version-check">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v2-license-version-check" data-method="POST"
      data-path="api/appza/v2/license/version/check"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v2-license-version-check', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v2-license-version-check"
                    onclick="tryItOut('POSTapi-appza-v2-license-version-check');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v2-license-version-check"
                    onclick="cancelTryOut('POSTapi-appza-v2-license-version-check');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v2-license-version-check"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v2/license/version/check</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v2-license-version-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v2-license-version-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v2-license-version-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v2-app-license-check">Mobile (app) check (params: site_url + product)</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v2-app-license-check">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v2/app/license-check" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"http:\\/\\/kunze.biz\\/iste-laborum-eius-est-dolor.html\",
    \"product\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/app/license-check"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "http:\/\/kunze.biz\/iste-laborum-eius-est-dolor.html",
    "product": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v2-app-license-check">
            <blockquote>
            <p>Example response (500):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v2
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Server Error&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v2-app-license-check" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v2-app-license-check"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v2-app-license-check"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v2-app-license-check" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v2-app-license-check">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v2-app-license-check" data-method="GET"
      data-path="api/appza/v2/app/license-check"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v2-app-license-check', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v2-app-license-check"
                    onclick="tryItOut('GETapi-appza-v2-app-license-check');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v2-app-license-check"
                    onclick="cancelTryOut('GETapi-appza-v2-app-license-check');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v2-app-license-check"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v2/app/license-check</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v2-app-license-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v2-app-license-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="GETapi-appza-v2-app-license-check"
               value="http://kunze.biz/iste-laborum-eius-est-dolor.html"
               data-component="body">
    <br>
<p>Example: <code>http://kunze.biz/iste-laborum-eius-est-dolor.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>product</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="product"                data-endpoint="GETapi-appza-v2-app-license-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v2-build">POST api/appza/v2/build</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v2-build">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v2/build" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"http:\\/\\/kunze.biz\\/iste-laborum-eius-est-dolor.html\",
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/build"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "http:\/\/kunze.biz\/iste-laborum-eius-est-dolor.html",
    "license_key": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v2-build">
</span>
<span id="execution-results-POSTapi-appza-v2-build" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v2-build"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v2-build"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v2-build" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v2-build">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v2-build" data-method="POST"
      data-path="api/appza/v2/build"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v2-build', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v2-build"
                    onclick="tryItOut('POSTapi-appza-v2-build');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v2-build"
                    onclick="cancelTryOut('POSTapi-appza-v2-build');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v2-build"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v2/build</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v2-build"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v2-build"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v2-build"
               value="http://kunze.biz/iste-laborum-eius-est-dolor.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://kunze.biz/iste-laborum-eius-est-dolor.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v2-build"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v2-build-history">GET api/appza/v2/build/history</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v2-build-history">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v2/build/history" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/build/history"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v2-build-history">
            <blockquote>
            <p>Example response (401):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: application/json
cache-control: no-cache, private
x-api-version: v2
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 401,
    &quot;message&quot;: &quot;Unauthorized&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v2-build-history" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v2-build-history"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v2-build-history"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v2-build-history" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v2-build-history">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v2-build-history" data-method="GET"
      data-path="api/appza/v2/build/history"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v2-build-history', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v2-build-history"
                    onclick="tryItOut('GETapi-appza-v2-build-history');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v2-build-history"
                    onclick="cancelTryOut('GETapi-appza-v2-build-history');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v2-build-history"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v2/build/history</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v2-build-history"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v2-build-history"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-POSTapi-appza-v2-build-resource">POST api/appza/v2/build/resource</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v2-build-resource">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v2/build/resource" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"app_name\": \"consequatur\",
    \"app_logo\": \"consequatur\",
    \"app_splash_screen_image\": \"consequatur\",
    \"site_url\": \"https:\\/\\/www.mueller.com\\/laborum-eius-est-dolor-dolores-minus-voluptatem\",
    \"license_key\": \"consequatur\",
    \"email\": \"carolyne.luettgen@example.org\",
    \"plugin_slug\": \"consequatur\",
    \"platform\": []
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/build/resource"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "app_name": "consequatur",
    "app_logo": "consequatur",
    "app_splash_screen_image": "consequatur",
    "site_url": "https:\/\/www.mueller.com\/laborum-eius-est-dolor-dolores-minus-voluptatem",
    "license_key": "consequatur",
    "email": "carolyne.luettgen@example.org",
    "plugin_slug": "consequatur",
    "platform": []
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v2-build-resource">
</span>
<span id="execution-results-POSTapi-appza-v2-build-resource" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v2-build-resource"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v2-build-resource"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v2-build-resource" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v2-build-resource">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v2-build-resource" data-method="POST"
      data-path="api/appza/v2/build/resource"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v2-build-resource', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v2-build-resource"
                    onclick="tryItOut('POSTapi-appza-v2-build-resource');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v2-build-resource"
                    onclick="cancelTryOut('POSTapi-appza-v2-build-resource');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v2-build-resource"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v2/build/resource</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v2-build-resource"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v2-build-resource"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>app_name</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="app_name"                data-endpoint="POSTapi-appza-v2-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>app_logo</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="app_logo"                data-endpoint="POSTapi-appza-v2-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>app_splash_screen_image</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="app_splash_screen_image"                data-endpoint="POSTapi-appza-v2-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v2-build-resource"
               value="https://www.mueller.com/laborum-eius-est-dolor-dolores-minus-voluptatem"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>https://www.mueller.com/laborum-eius-est-dolor-dolores-minus-voluptatem</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v2-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>email</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="email"                data-endpoint="POSTapi-appza-v2-build-resource"
               value="carolyne.luettgen@example.org"
               data-component="body">
    <br>
<p>Must be a valid email address. Example: <code>carolyne.luettgen@example.org</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>plugin_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="plugin_slug"                data-endpoint="POSTapi-appza-v2-build-resource"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>platform</code></b>&nbsp;&nbsp;
<small>object</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="platform"                data-endpoint="POSTapi-appza-v2-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_issuer_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_issuer_id"                data-endpoint="POSTapi-appza-v2-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_key_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_key_id"                data-endpoint="POSTapi-appza-v2-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_p8_file_content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_p8_file_content"                data-endpoint="POSTapi-appza-v2-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_team_id"                data-endpoint="POSTapi-appza-v2-build-resource"
               value=""
               data-component="body">
    <br>

        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v2-build-ios-keys-verify">POST api/appza/v2/build/ios-keys-verify</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v2-build-ios-keys-verify">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v2/build/ios-keys-verify" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"consequatur\",
    \"license_key\": \"consequatur\",
    \"ios_issuer_id\": \"consequatur\",
    \"ios_key_id\": \"consequatur\",
    \"ios_p8_file_content\": \"consequatur\",
    \"ios_team_id\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/build/ios-keys-verify"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "consequatur",
    "license_key": "consequatur",
    "ios_issuer_id": "consequatur",
    "ios_key_id": "consequatur",
    "ios_p8_file_content": "consequatur",
    "ios_team_id": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v2-build-ios-keys-verify">
</span>
<span id="execution-results-POSTapi-appza-v2-build-ios-keys-verify" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v2-build-ios-keys-verify"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v2-build-ios-keys-verify"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v2-build-ios-keys-verify" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v2-build-ios-keys-verify">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v2-build-ios-keys-verify" data-method="POST"
      data-path="api/appza/v2/build/ios-keys-verify"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v2-build-ios-keys-verify', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v2-build-ios-keys-verify"
                    onclick="tryItOut('POSTapi-appza-v2-build-ios-keys-verify');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v2-build-ios-keys-verify"
                    onclick="cancelTryOut('POSTapi-appza-v2-build-ios-keys-verify');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v2-build-ios-keys-verify"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v2/build/ios-keys-verify</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v2-build-ios-keys-verify"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v2-build-ios-keys-verify"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v2-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v2-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_issuer_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_issuer_id"                data-endpoint="POSTapi-appza-v2-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_key_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_key_id"                data-endpoint="POSTapi-appza-v2-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_p8_file_content</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_p8_file_content"                data-endpoint="POSTapi-appza-v2-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>ios_team_id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="ios_team_id"                data-endpoint="POSTapi-appza-v2-build-ios-keys-verify"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v2-build-ios-check-app-name">POST api/appza/v2/build/ios-check-app-name</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v2-build-ios-check-app-name">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v2/build/ios-check-app-name" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"site_url\": \"http:\\/\\/kunze.biz\\/iste-laborum-eius-est-dolor.html\",
    \"license_key\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/build/ios-check-app-name"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "site_url": "http:\/\/kunze.biz\/iste-laborum-eius-est-dolor.html",
    "license_key": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v2-build-ios-check-app-name">
</span>
<span id="execution-results-POSTapi-appza-v2-build-ios-check-app-name" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v2-build-ios-check-app-name"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v2-build-ios-check-app-name"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v2-build-ios-check-app-name" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v2-build-ios-check-app-name">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v2-build-ios-check-app-name" data-method="POST"
      data-path="api/appza/v2/build/ios-check-app-name"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v2-build-ios-check-app-name', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v2-build-ios-check-app-name"
                    onclick="tryItOut('POSTapi-appza-v2-build-ios-check-app-name');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v2-build-ios-check-app-name"
                    onclick="cancelTryOut('POSTapi-appza-v2-build-ios-check-app-name');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v2-build-ios-check-app-name"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v2/build/ios-check-app-name</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v2-build-ios-check-app-name"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v2-build-ios-check-app-name"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>site_url</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="site_url"                data-endpoint="POSTapi-appza-v2-build-ios-check-app-name"
               value="http://kunze.biz/iste-laborum-eius-est-dolor.html"
               data-component="body">
    <br>
<p>Must be a valid URL. Example: <code>http://kunze.biz/iste-laborum-eius-est-dolor.html</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>license_key</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="license_key"                data-endpoint="POSTapi-appza-v2-build-ios-check-app-name"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v2-build-response--id-">POST api/appza/v2/build/response/{id}</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v2-build-response--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v2/build/response/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"build_message\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/build/response/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "build_message": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v2-build-response--id-">
</span>
<span id="execution-results-POSTapi-appza-v2-build-response--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v2-build-response--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v2-build-response--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v2-build-response--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v2-build-response--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v2-build-response--id-" data-method="POST"
      data-path="api/appza/v2/build/response/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v2-build-response--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v2-build-response--id-"
                    onclick="tryItOut('POSTapi-appza-v2-build-response--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v2-build-response--id-"
                    onclick="cancelTryOut('POSTapi-appza-v2-build-response--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v2-build-response--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v2/build/response/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v2-build-response--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v2-build-response--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-appza-v2-build-response--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the response. Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>build_message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="build_message"                data-endpoint="POSTapi-appza-v2-build-response--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-POSTapi-appza-v2-build-process-start--id-">POST api/appza/v2/build/process-start/{id}</h2>

<p>
</p>



<span id="example-requests-POSTapi-appza-v2-build-process-start--id-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request POST \
    "http://localhost/api/appza/v2/build/process-start/consequatur" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"build_message\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/build/process-start/consequatur"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "build_message": "consequatur"
};

fetch(url, {
    method: "POST",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-POSTapi-appza-v2-build-process-start--id-">
</span>
<span id="execution-results-POSTapi-appza-v2-build-process-start--id-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-POSTapi-appza-v2-build-process-start--id-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-POSTapi-appza-v2-build-process-start--id-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-POSTapi-appza-v2-build-process-start--id-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-POSTapi-appza-v2-build-process-start--id-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-POSTapi-appza-v2-build-process-start--id-" data-method="POST"
      data-path="api/appza/v2/build/process-start/{id}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('POSTapi-appza-v2-build-process-start--id-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-POSTapi-appza-v2-build-process-start--id-"
                    onclick="tryItOut('POSTapi-appza-v2-build-process-start--id-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-POSTapi-appza-v2-build-process-start--id-"
                    onclick="cancelTryOut('POSTapi-appza-v2-build-process-start--id-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-POSTapi-appza-v2-build-process-start--id-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-black">POST</small>
            <b><code>api/appza/v2/build/process-start/{id}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="POSTapi-appza-v2-build-process-start--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="POSTapi-appza-v2-build-process-start--id-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>id</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="id"                data-endpoint="POSTapi-appza-v2-build-process-start--id-"
               value="consequatur"
               data-component="url">
    <br>
<p>The ID of the process start. Example: <code>consequatur</code></p>
            </div>
                            <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>build_message</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
<i>optional</i> &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="build_message"                data-endpoint="POSTapi-appza-v2-build-process-start--id-"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v2-plugins">GET api/appza/v2/plugins</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v2-plugins">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v2/plugins" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/plugins"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v2-plugins">
            <blockquote>
            <p>Example response (200):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v2
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;data&quot;: [
        {
            &quot;id&quot;: 1,
            &quot;name&quot;: &quot;Wordpress&quot;,
            &quot;slug&quot;: &quot;wordpress&quot;,
            &quot;prefix&quot;: &quot;WP_&quot;,
            &quot;title&quot;: null,
            &quot;description&quot;: null,
            &quot;others&quot;: null,
            &quot;created&quot;: &quot;08-Dec-2024&quot;,
            &quot;is_disable&quot;: false,
            &quot;image&quot;: &quot;https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/ddzuCEwl9MvmQzsSNEuW79kyodZx53fsjZ5WJ6ig.png&quot;
        },
        {
            &quot;id&quot;: 2,
            &quot;name&quot;: &quot;Woocommerce&quot;,
            &quot;slug&quot;: &quot;woocommerce&quot;,
            &quot;prefix&quot;: &quot;Woo_&quot;,
            &quot;title&quot;: null,
            &quot;description&quot;: null,
            &quot;others&quot;: null,
            &quot;created&quot;: &quot;08-Dec-2024&quot;,
            &quot;is_disable&quot;: false,
            &quot;image&quot;: &quot;https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/NDeIlDIhqEwi2leoHFBsbiRfj1L4IME1pgpmScVo.png&quot;
        },
        {
            &quot;id&quot;: 3,
            &quot;name&quot;: &quot;Tutor LMS&quot;,
            &quot;slug&quot;: &quot;tutor-lms&quot;,
            &quot;prefix&quot;: &quot;TLMS_&quot;,
            &quot;title&quot;: null,
            &quot;description&quot;: null,
            &quot;others&quot;: null,
            &quot;created&quot;: &quot;08-Dec-2024&quot;,
            &quot;is_disable&quot;: true,
            &quot;image&quot;: &quot;https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/E6QoV7rguGrLydmlkp5cskNhYrQ6Z3zigZgf2sWk.png&quot;
        },
        {
            &quot;id&quot;: 4,
            &quot;name&quot;: &quot;Fluent Community&quot;,
            &quot;slug&quot;: &quot;fluent-community&quot;,
            &quot;prefix&quot;: &quot;FCommunity_&quot;,
            &quot;title&quot;: null,
            &quot;description&quot;: null,
            &quot;others&quot;: null,
            &quot;created&quot;: &quot;08-Dec-2024&quot;,
            &quot;is_disable&quot;: true,
            &quot;image&quot;: &quot;https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/j1r8UqnkWrYtbWw0rzepVxDOmi5Jm4L73I8S8I47.png&quot;
        },
        {
            &quot;id&quot;: 7,
            &quot;name&quot;: &quot;Lazy Tasks&quot;,
            &quot;slug&quot;: &quot;lazy-tasks&quot;,
            &quot;prefix&quot;: &quot;LTasks_&quot;,
            &quot;title&quot;: null,
            &quot;description&quot;: null,
            &quot;others&quot;: null,
            &quot;created&quot;: &quot;08-Dec-2024&quot;,
            &quot;is_disable&quot;: true,
            &quot;image&quot;: &quot;https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/FdFf6iG6jLEXg6WEcjDQ57cWurCUnGVyYQDyBOP7.png&quot;
        },
        {
            &quot;id&quot;: 6,
            &quot;name&quot;: &quot;Learn Dash&quot;,
            &quot;slug&quot;: &quot;learn-dash&quot;,
            &quot;prefix&quot;: &quot;LDash_&quot;,
            &quot;title&quot;: null,
            &quot;description&quot;: null,
            &quot;others&quot;: null,
            &quot;created&quot;: &quot;08-Dec-2024&quot;,
            &quot;is_disable&quot;: true,
            &quot;image&quot;: &quot;https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/an8e0k8Pop1PhsYWlGrJvfmMeyMfcnedW3Ka1xSF.png&quot;
        },
        {
            &quot;id&quot;: 5,
            &quot;name&quot;: &quot;Lifter LMS&quot;,
            &quot;slug&quot;: &quot;lifter-lms&quot;,
            &quot;prefix&quot;: &quot;LLMS_&quot;,
            &quot;title&quot;: null,
            &quot;description&quot;: null,
            &quot;others&quot;: null,
            &quot;created&quot;: &quot;08-Dec-2024&quot;,
            &quot;is_disable&quot;: true,
            &quot;image&quot;: &quot;https://pub-f696dec17da54dec9c83692c46cfb446.r2.dev/plugins/6581UcKX7vSqAAJzNrPro9CbdEBPZZvLauMAouu9.png&quot;
        }
    ],
    &quot;status&quot;: 200,
    &quot;url&quot;: &quot;http://localhost/api/appza/v2/plugins&quot;,
    &quot;method&quot;: &quot;GET&quot;,
    &quot;message&quot;: &quot;Data Found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v2-plugins" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v2-plugins"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v2-plugins"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v2-plugins" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v2-plugins">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v2-plugins" data-method="GET"
      data-path="api/appza/v2/plugins"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v2-plugins', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v2-plugins"
                    onclick="tryItOut('GETapi-appza-v2-plugins');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v2-plugins"
                    onclick="cancelTryOut('GETapi-appza-v2-plugins');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v2-plugins"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v2/plugins</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v2-plugins"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v2-plugins"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v2-plugin-check-disable">GET api/appza/v2/plugin/check-disable</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v2-plugin-check-disable">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v2/plugin/check-disable" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/plugin/check-disable"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v2-plugin-check-disable">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">content-type: application/json
cache-control: no-cache, private
x-api-version: v2
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 404,
    &quot;url&quot;: &quot;http://localhost/api/appza/v2/plugin/check-disable&quot;,
    &quot;method&quot;: &quot;GET&quot;,
    &quot;message&quot;: &quot;Data Not Found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v2-plugin-check-disable" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v2-plugin-check-disable"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v2-plugin-check-disable"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v2-plugin-check-disable" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v2-plugin-check-disable">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v2-plugin-check-disable" data-method="GET"
      data-path="api/appza/v2/plugin/check-disable"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v2-plugin-check-disable', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v2-plugin-check-disable"
                    onclick="tryItOut('GETapi-appza-v2-plugin-check-disable');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v2-plugin-check-disable"
                    onclick="cancelTryOut('GETapi-appza-v2-plugin-check-disable');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v2-plugin-check-disable"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v2/plugin/check-disable</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v2-plugin-check-disable"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v2-plugin-check-disable"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        </form>

                    <h2 id="endpoints-GETapi-appza-v2-plugin-install-latest-version">GET api/appza/v2/plugin/install-latest-version</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v2-plugin-install-latest-version">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v2/plugin/install-latest-version" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"plugin_slug\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/plugin/install-latest-version"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "plugin_slug": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v2-plugin-install-latest-version">
            <blockquote>
            <p>Example response (400):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v2
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 400,
    &quot;message&quot;: &quot;Validation Error&quot;,
    &quot;errors&quot;: {
        &quot;plugin_slug&quot;: [
            &quot;The selected plugin slug is invalid.&quot;
        ]
    }
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v2-plugin-install-latest-version" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v2-plugin-install-latest-version"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v2-plugin-install-latest-version"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v2-plugin-install-latest-version" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v2-plugin-install-latest-version">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v2-plugin-install-latest-version" data-method="GET"
      data-path="api/appza/v2/plugin/install-latest-version"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v2-plugin-install-latest-version', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v2-plugin-install-latest-version"
                    onclick="tryItOut('GETapi-appza-v2-plugin-install-latest-version');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v2-plugin-install-latest-version"
                    onclick="cancelTryOut('GETapi-appza-v2-plugin-install-latest-version');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v2-plugin-install-latest-version"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v2/plugin/install-latest-version</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v2-plugin-install-latest-version"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v2-plugin-install-latest-version"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>plugin_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="plugin_slug"                data-endpoint="GETapi-appza-v2-plugin-install-latest-version"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi-appza-v2-plugin-version-check">GET api/appza/v2/plugin/version-check</h2>

<p>
</p>



<span id="example-requests-GETapi-appza-v2-plugin-version-check">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/appza/v2/plugin/version-check" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json" \
    --data "{
    \"installed_version\": \"consequatur\",
    \"plugin_slug\": \"consequatur\"
}"
</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/appza/v2/plugin/version-check"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

let body = {
    "installed_version": "consequatur",
    "plugin_slug": "consequatur"
};

fetch(url, {
    method: "GET",
    headers,
    body: JSON.stringify(body),
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi-appza-v2-plugin-version-check">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
x-api-version: v2
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;status&quot;: 404,
    &quot;message&quot;: &quot;Plugin not found&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi-appza-v2-plugin-version-check" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi-appza-v2-plugin-version-check"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi-appza-v2-plugin-version-check"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi-appza-v2-plugin-version-check" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi-appza-v2-plugin-version-check">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi-appza-v2-plugin-version-check" data-method="GET"
      data-path="api/appza/v2/plugin/version-check"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi-appza-v2-plugin-version-check', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi-appza-v2-plugin-version-check"
                    onclick="tryItOut('GETapi-appza-v2-plugin-version-check');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi-appza-v2-plugin-version-check"
                    onclick="cancelTryOut('GETapi-appza-v2-plugin-version-check');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi-appza-v2-plugin-version-check"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/appza/v2/plugin/version-check</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi-appza-v2-plugin-version-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi-appza-v2-plugin-version-check"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <h4 class="fancy-heading-panel"><b>Body Parameters</b></h4>
        <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>installed_version</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="installed_version"                data-endpoint="GETapi-appza-v2-plugin-version-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
                <div style=" padding-left: 28px;  clear: unset;">
            <b style="line-height: 2;"><code>plugin_slug</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="plugin_slug"                data-endpoint="GETapi-appza-v2-plugin-version-check"
               value="consequatur"
               data-component="body">
    <br>
<p>Example: <code>consequatur</code></p>
        </div>
        </form>

                    <h2 id="endpoints-GETapi--fallbackPlaceholder-">GET api/{fallbackPlaceholder}</h2>

<p>
</p>



<span id="example-requests-GETapi--fallbackPlaceholder-">
<blockquote>Example request:</blockquote>


<div class="bash-example">
    <pre><code class="language-bash">curl --request GET \
    --get "http://localhost/api/2UZ5i" \
    --header "Content-Type: application/json" \
    --header "Accept: application/json"</code></pre></div>


<div class="javascript-example">
    <pre><code class="language-javascript">const url = new URL(
    "http://localhost/api/2UZ5i"
);

const headers = {
    "Content-Type": "application/json",
    "Accept": "application/json",
};

fetch(url, {
    method: "GET",
    headers,
}).then(response =&gt; response.json());</code></pre></div>

</span>

<span id="example-responses-GETapi--fallbackPlaceholder-">
            <blockquote>
            <p>Example response (404):</p>
        </blockquote>
                <details class="annotation">
            <summary style="cursor: pointer;">
                <small onclick="textContent = parentElement.parentElement.open ? 'Show headers' : 'Hide headers'">Show headers</small>
            </summary>
            <pre><code class="language-http">cache-control: no-cache, private
content-type: application/json
access-control-allow-origin: *
 </code></pre></details>         <pre>

<code class="language-json" style="max-height: 300px;">{
    &quot;message&quot;: &quot;Endpoint not found or version retired.&quot;,
    &quot;recommended_version&quot;: &quot;v2&quot;
}</code>
 </pre>
    </span>
<span id="execution-results-GETapi--fallbackPlaceholder-" hidden>
    <blockquote>Received response<span
                id="execution-response-status-GETapi--fallbackPlaceholder-"></span>:
    </blockquote>
    <pre class="json"><code id="execution-response-content-GETapi--fallbackPlaceholder-"
      data-empty-response-text="<Empty response>" style="max-height: 400px;"></code></pre>
</span>
<span id="execution-error-GETapi--fallbackPlaceholder-" hidden>
    <blockquote>Request failed with error:</blockquote>
    <pre><code id="execution-error-message-GETapi--fallbackPlaceholder-">

Tip: Check that you&#039;re properly connected to the network.
If you&#039;re a maintainer of ths API, verify that your API is running and you&#039;ve enabled CORS.
You can check the Dev Tools console for debugging information.</code></pre>
</span>
<form id="form-GETapi--fallbackPlaceholder-" data-method="GET"
      data-path="api/{fallbackPlaceholder}"
      data-authed="0"
      data-hasfiles="0"
      data-isarraybody="0"
      autocomplete="off"
      onsubmit="event.preventDefault(); executeTryOut('GETapi--fallbackPlaceholder-', this);">
    <h3>
        Request&nbsp;&nbsp;&nbsp;
                    <button type="button"
                    style="background-color: #8fbcd4; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-tryout-GETapi--fallbackPlaceholder-"
                    onclick="tryItOut('GETapi--fallbackPlaceholder-');">Try it out ⚡
            </button>
            <button type="button"
                    style="background-color: #c97a7e; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-canceltryout-GETapi--fallbackPlaceholder-"
                    onclick="cancelTryOut('GETapi--fallbackPlaceholder-');" hidden>Cancel 🛑
            </button>&nbsp;&nbsp;
            <button type="submit"
                    style="background-color: #6ac174; padding: 5px 10px; border-radius: 5px; border-width: thin;"
                    id="btn-executetryout-GETapi--fallbackPlaceholder-"
                    data-initial-text="Send Request 💥"
                    data-loading-text="⏱ Sending..."
                    hidden>Send Request 💥
            </button>
            </h3>
            <p>
            <small class="badge badge-green">GET</small>
            <b><code>api/{fallbackPlaceholder}</code></b>
        </p>
                <h4 class="fancy-heading-panel"><b>Headers</b></h4>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Content-Type</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Content-Type"                data-endpoint="GETapi--fallbackPlaceholder-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                                <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>Accept</code></b>&nbsp;&nbsp;
&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="Accept"                data-endpoint="GETapi--fallbackPlaceholder-"
               value="application/json"
               data-component="header">
    <br>
<p>Example: <code>application/json</code></p>
            </div>
                        <h4 class="fancy-heading-panel"><b>URL Parameters</b></h4>
                    <div style="padding-left: 28px; clear: unset;">
                <b style="line-height: 2;"><code>fallbackPlaceholder</code></b>&nbsp;&nbsp;
<small>string</small>&nbsp;
 &nbsp;
 &nbsp;
                <input type="text" style="display: none"
                              name="fallbackPlaceholder"                data-endpoint="GETapi--fallbackPlaceholder-"
               value="2UZ5i"
               data-component="url">
    <br>
<p>Example: <code>2UZ5i</code></p>
            </div>
                    </form>

            

        
    </div>
    <div class="dark-box">
                    <div class="lang-selector">
                                                        <button type="button" class="lang-button" data-language-name="bash">bash</button>
                                                        <button type="button" class="lang-button" data-language-name="javascript">javascript</button>
                            </div>
            </div>
</div>
</body>
</html>
