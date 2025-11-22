
(() => {
    let pixel_url_base = "https:\/\/fomo.codedthemes.com\/";
    let pixel_title = "CodedThemes";
    let pixel_key = "Oo2pYDncP8R8qhhETpWKGA04b8jPhUjF";
    let pixel_analytics = true;
    let pixel_css_loaded = false;
    let campaign_domain = "mantisdashboard.com";
    if(campaign_domain.startsWith('www.')) {
        campaign_domain = campaign_domain.replace('www.', '');
    }

    /* Make sure the campaign loads only where expected */
    if(
        window.location.hostname !== campaign_domain && window.location.hostname !== `www.${campaign_domain}`
    ) {
        console.log(`${pixel_title} (${pixel_url_base}): Campaign does not match the set domain/subdomain.`);
        return;
    }

    /* Make sure to include the external css file */
    let link = document.createElement('link');
    link.href = 'https://fomo.codedthemes.com/themes/altum/assets/css/pixel.min.css';
    link.type = 'text/css';
    link.rel = 'stylesheet';
    link.media = 'screen,print';
    link.onload = function() { pixel_css_loaded = true };
    document.getElementsByTagName('head')[0].appendChild(link);

    /* Pixel header including all the needed code */
    let send_tracking_data=t=>{if(!(t.subtype&&["impression","click","hover"].includes(t.subtype))||pixel_analytics){t.url=window.location.href;try{navigator.sendBeacon(`${pixel_url_base}pixel-track/${pixel_key}`,JSON.stringify(t))}catch(i){console.log(`${pixel_title} (${pixel_url_base}): ${i}`)}}},get_scroll_percentage=()=>{let t=document.documentElement,i=document.body,e="scrollTop",o="scrollHeight";return(t[e]||i[e])/((t[o]||i[o])-t.clientHeight)*100};class AltumCodeManager{constructor(t){this.options={},this.options.content=t.content||"",this.options.should_show=void 0===t.should_show||t.should_show,this.options.delay=void 0===t.delay?3e3:t.delay,this.options.duration=void 0===t.duration?3e3:t.duration,this.options.selector=t.selector,this.options.url=t.url,this.options.url_new_tab=void 0===t.url_new_tab||t.url_new_tab,this.options.close=void 0!==t.close&&t.close,this.options.stop_on_focus=!0,this.options.position=void 0===t.position?"bottom_left":t.position,this.options.trigger_all_pages=void 0===t.trigger_all_pages||t.trigger_all_pages,this.options.triggers=t.triggers||[],this.options.display_frequency=void 0===t.display_frequency?"all_time":t.display_frequency,this.options.display_mobile=void 0===t.display_mobile||t.display_mobile,this.options.display_desktop=void 0===t.display_desktop||t.display_desktop,this.options.display_trigger=void 0===t.display_trigger?"delay":t.display_trigger,this.options.display_trigger_value=void 0===t.display_trigger_value?3:t.display_trigger_value,this.options.display_delay_type_after_close=void 0===t.display_delay_type_after_close?"time_on_site":t.display_delay_type_after_close,this.options.display_delay_value_after_close=void 0===t.display_delay_value_after_close?21600:t.display_delay_value_after_close,this.options.data_trigger_auto=void 0!==t.data_trigger_auto&&t.data_trigger_auto,this.options.data_triggers_auto=t.data_triggers_auto||[],this.options.on_animation=void 0===t.on_animation?"fadeIn":t.on_animation,this.options.off_animation=void 0===t.off_animation?"fadeOut":t.off_animation,this.options.animation=void 0!==t.animation&&t.animation,this.options.animation_interval=void 0===t.animation_interval?5:t.animation_interval,this.options.notification_id=t.notification_id||!1}build(){if(this.options.data_trigger_auto&&this.is_page_triggered(this.options.data_triggers_auto)&&document.querySelectorAll("form").forEach(t=>{!t.getAttribute(`data-${pixel_key}-${this.options.notification_id}-form`)&&(t.addEventListener("submit",i=>{let e={};t.querySelectorAll("input").forEach(t=>{"password"!=t.type&&"hidden"!=t.type&&-1===t.name.indexOf("captcha")&&(e[`form_${t.name}`]=t.value)}),send_tracking_data({...e,notification_id:this.options.notification_id,page_title:document.title,type:"auto_capture"})}),t.setAttribute(`data-${pixel_key}-${this.options.notification_id}-form`,!0))}),!this.options.should_show||!this.options.trigger_all_pages&&!this.is_page_triggered(this.options.triggers))return!1;switch(this.options.display_frequency){case"all_time":break;case"once_per_session":if(sessionStorage.getItem(`notification_display_frequency_${this.options.notification_id}`))return!1;break;case"once_per_browser":if(localStorage.getItem(`notification_display_frequency_${this.options.notification_id}`))return!1}if(!this.options.display_mobile&&window.innerWidth<768||!this.options.display_desktop&&window.innerWidth>768)return!1;if(sessionStorage.getItem(`notification_manually_closed_${this.options.notification_id}`))switch(this.options.display_delay_type_after_close){case"time_on_site":if(parseInt(sessionStorage.getItem(`notification_display_delay_type_after_close_time_on_site_${this.options.notification_id}`)??0)<1e3*this.options.display_delay_value_after_close)return setInterval(()=>{let t=parseInt(sessionStorage.getItem(`notification_display_delay_type_after_close_time_on_site_${this.options.notification_id}`)??0);sessionStorage.setItem(`notification_display_delay_type_after_close_time_on_site_${this.options.notification_id}`,t+500)},500),!1;break;case"pageviews":let t=parseInt(sessionStorage.getItem(`notification_display_delay_type_after_close_pageviews_${this.options.notification_id}`)??0)+1;if(sessionStorage.setItem(`notification_display_delay_type_after_close_pageviews_${this.options.notification_id}`,t),t<this.options.display_delay_value_after_close)return!1}let i=document.createElement("div");if(i.className="altumcode",i.className+=` altumcode-${this.options.position}`,i.setAttribute("data-position",this.options.position),i.setAttribute("data-on-animation",this.options.on_animation),i.setAttribute("data-off-animation",this.options.off_animation),i.setAttribute("data-notification-id",this.options.notification_id),i.innerHTML=this.options.content,this.options.close){let e=i.querySelector('button[class="altumcode-close"]');e&&(e.innerHTML="\xd7",e.addEventListener("click",t=>{t.stopPropagation(),sessionStorage.setItem(`notification_manually_closed_${this.options.notification_id}`,!0),sessionStorage.removeItem(`notification_display_delay_type_after_close_time_on_site_${this.options.notification_id}`),sessionStorage.removeItem(`notification_display_delay_type_after_close_pageviews_${this.options.notification_id}`),this.constructor.remove_notification(i)}))}else i.querySelector('button[class="altumcode-close"]')&&(i.querySelector('button[class="altumcode-close"]').innerHTML="");void 0!==this.options.url&&""!==this.options.url&&(i.classList.add("altumcode-clickable"),i.addEventListener("click",t=>{this.options.notification_id&&send_tracking_data({notification_id:this.options.notification_id,type:"notification",subtype:"click"}),this.options.url_new_tab?window.open(this.options.url,"_blank"):window.location=this.options.url,t.stopPropagation()}));let o=i.querySelector(".altumcode-site");return o&&o.addEventListener("click",t=>{let i=t.currentTarget.href;window.open(i,"_blank"),t.stopPropagation(),t.preventDefault()}),i}initiate(t={}){let i=()=>{let i=null;i=setInterval(()=>{pixel_css_loaded&&(clearInterval(i),this.process(t))},100)};"complete"!==document.readyState&&("loading"===document.readyState||document.documentElement.doScroll)?document.addEventListener("DOMContentLoaded",()=>{i()}):i();let e=location.href;setInterval(()=>{if(e!=location.href){e=location.href;let t=document.querySelector(`[data-notification-id="${this.options.notification_id}"]`);this.constructor.remove_notification(t),i()}},750)}process(t={}){let i=this.build();if(!i)return!1;switch(this.options.position){case"top":case"top_floating":document.body.prepend(i);break;default:document.body.appendChild(i)}let e=()=>{switch(i.style.display="block",i.classList.add(`on-${this.options.on_animation}`),i.classList.add("on-visible"),setTimeout(()=>{i.classList.remove(`on-${this.options.on_animation}`)},1500),this.constructor.reposition(),t.displayed&&t.displayed(i),this.options.animation&&(i.animation_interval=window.setInterval(()=>{i.classList.add(`animation-${this.options.animation}`),setTimeout(()=>{i.classList.remove(`animation-${this.options.animation}`)},(this.options.animation_interval-1)*1e3)},1e3*this.options.animation_interval)),-1!==this.options.duration&&(i.timeout=window.setTimeout(()=>{this.constructor.remove_notification(i)},this.options.duration)),this.options.stop_on_focus&&-1!==this.options.duration&&(i.addEventListener("mouseover",t=>{window.clearTimeout(i.timeout)}),i.addEventListener("mouseleave",()=>{i.timeout=window.setTimeout(()=>{this.constructor.remove_notification(i)},this.options.duration)})),this.options.display_frequency){case"all_time":break;case"once_per_session":sessionStorage.setItem(`notification_display_frequency_${this.options.notification_id}`,!0);break;case"once_per_browser":localStorage.setItem(`notification_display_frequency_${this.options.notification_id}`,!0)}this.options.notification_id&&(send_tracking_data({notification_id:this.options.notification_id,type:"notification",subtype:"impression"}),i.addEventListener("mouseover",()=>{sessionStorage.getItem(`notification_hover_${this.options.notification_id}`)||(send_tracking_data({notification_id:this.options.notification_id,type:"notification",subtype:"hover"}),sessionStorage.setItem(`notification_hover_${this.options.notification_id}`,!0))})),window.removeEventListener("resize",this.constructor.reposition),window.addEventListener("resize",this.constructor.reposition)};switch(this.options.display_trigger){case"delay":setTimeout(()=>{e()},1e3*this.options.display_trigger_value);break;case"time_on_site":let o=()=>{let t=parseInt(sessionStorage.getItem(`notification_display_trigger_time_on_site_${this.options.notification_id}`)??0);t>1e3*this.options.display_trigger_value&&(e(),clearInterval(s)),sessionStorage.setItem(`notification_display_trigger_time_on_site_${this.options.notification_id}`,t+500)},s=setInterval(o,500);o();break;case"inactivity":let n=null,a=!1,r=()=>{a||(clearTimeout(n),n=setTimeout(()=>{e(),a=!0,["load","mousemove","mousedown","touchstart","touchmove","click","keydown","scroll","wheel"].forEach(t=>{window.removeEventListener(t,r,!0)})},1e3*this.options.display_trigger_value))};["load","mousemove","mousedown","touchstart","touchmove","click","keydown","scroll","wheel"].forEach(t=>{window.addEventListener(t,r,!0)});break;case"pageviews":let l=parseInt(sessionStorage.getItem(`notification_display_trigger_pageviews_${this.options.notification_id}`)??0)+1;sessionStorage.setItem(`notification_display_trigger_pageviews_${this.options.notification_id}`,l),l>=this.options.display_trigger_value&&e();break;case"exit_intent":let c=!1;document.addEventListener("mouseout",t=>{let i=Math.max(document.documentElement.clientWidth,window.innerWidth||0);if(!(t.clientX>=i-50)&&!(t.clientY>=50))t.relatedTarget||t.toElement||c||(e(),c=!0)});break;case"scroll":let d=!1;document.addEventListener("scroll",t=>{!d&&get_scroll_percentage()>this.options.display_trigger_value&&(e(),d=!0)});break;case"click":document.querySelector(this.options.display_trigger_value)&&document.querySelector(this.options.display_trigger_value).addEventListener("click",t=>{e()});break;case"hover":document.querySelector(this.options.display_trigger_value)&&document.querySelector(this.options.display_trigger_value).addEventListener("mouseenter",t=>{e()})}}is_page_triggered(t){let i=!1;for(let e of t)if(e.type.startsWith("not_")){i=!0;break}return t.forEach(t=>{switch(t.type){case"exact":t.value==window.location.href&&(i=!0);break;case"not_exact":t.value==window.location.href&&(i=!1);break;case"contains":window.location.href.includes(t.value)&&(i=!0);break;case"not_contains":window.location.href.includes(t.value)&&(i=!1);break;case"starts_with":window.location.href.startsWith(t.value)&&(i=!0);break;case"not_starts_with":window.location.href.startsWith(t.value)&&(i=!1);break;case"ends_with":window.location.href.endsWith(t.value)&&(i=!0);break;case"not_ends_with":window.location.href.endsWith(t.value)&&(i=!1);break;case"page_contains":document.body.innerText.includes(t.value)&&(i=!0)}}),i}static remove_notification(t){try{t.getAttribute("data-on-animation");let i=t.getAttribute("data-off-animation");t.classList.add(`off-${i}`),window.setTimeout(()=>{t.parentNode.removeChild(t),AltumCodeManager.reposition()},400)}catch(e){}}static reposition(){let t=document.querySelectorAll('div[class*="altumcode"][class*="on-"]'),i=Math.floor((window.innerHeight>0?window.innerHeight:screen.height)/2),e={top_left:{left:20,top:20},top_center:{top:20},top_right:{right:20,top:20},middle_left:{left:20,top:i},middle_center:{top:i},middle_right:{right:20,top:i},bottom_left:{left:20,bottom:20},bottom_center:{bottom:20},bottom_right:{right:20,bottom:20}};for(let o=t.length-1;o>=0;o--){let s=t[o].getAttribute("data-position"),n=t[o].offsetHeight;switch(s){default:continue;case"top_left":case"top_center":case"top_right":t[o].style.top=`${e[s].top}px`,e[s].top+=n+20;break;case"middle_left":case"middle_center":case"middle_right":t[o].style.top=`${e[s].top-n/2}px`,e[s].top+=n+20;break;case"bottom_left":case"bottom_center":case"bottom_right":t[o].style.bottom=`${e[s].bottom}px`,e[s].bottom+=n+20}}}}

    





new AltumCodeManager({
    content: "\n<div id=\"notification_18\" role=\"dialog\" class=\"altumcode-wrapper altumcode-wrapper-rounded altumcode-wrapper-shadow-feather   altumcode-informational-wrapper\" style='font-family: inherit!important;background-color: #96ECC3;border-width: 0px;border-color: #000;;padding: 8px !important;;--shadow-r: 0;--shadow-g: 0;--shadow-b: 0;'>\n    <div class=\"altumcode-informational-content\">\n                <img src=\"https:\/\/fomo.codedthemes.com\/uploads\/notifications\/adbe079ad86948e968ade7665087b25b.svg\" class=\"altumcode-informational-image\" alt=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer\" \/>\n        \n        <div>\n            <div class=\"altumcode-informational-header\">\n                <p class=\"altumcode-informational-title\" style=\"color: #000000\">New Update 4.0.0<\/p>\n\n                <button class=\"altumcode-close\" style=\"color: #000000;\">\u00d7<\/button>\n            <\/div>\n            <p class=\"altumcode-informational-description\" style=\"color: #000\">Enhanced UI, Performance &amp; Components.<\/p>\n\n\n                            <a href=\"https:\/\/fomo.codedthemes.com\/\" class=\"altumcode-site\" style=\"display: none !important;\"><\/a>\n                    <\/div>\n    <\/div>\n<\/div>\n",
    display_mobile: 1,
    display_desktop: 1,
    display_trigger: "delay",
    display_trigger_value: 2,
    display_delay_type_after_close: "time_on_site",
    display_delay_value_after_close: 21600,
    duration: -1,
    url: "https:\/\/codedthemes.gitbook.io\/mantis\/changelog",
    url_new_tab: 1,
    close: 1,
    display_frequency: "all_time",
    position: "bottom_right",
    trigger_all_pages: 0,
    triggers: [{"type":"not_starts_with","value":"https:\/\/mantisdashboard.com\/angular\/"},{"type":"not_starts_with","value":"https:\/\/mantisdashboard.com\/bootstrap\/"},{"type":"not_starts_with","value":"https:\/\/mantisdashboard.com\/vue\/"},{"type":"not_starts_with","value":"https:\/\/mantisdashboard.com\/codeigniter\/"}],
    on_animation: "fadeIn",
    off_animation: "fadeOut",
    animation: "",
    animation_interval: 3,

    notification_id: 18}).initiate();







new AltumCodeManager({
    content: "<style>\n    #notification_28{\r\nwidth: 395px !important;\r\nmax-width: 395px !important;\r\n}\r\n.notification-wrapper{\r\n            Width: 385px !important;\r\n            background: linear-gradient(94.42deg, #484849 -3.37%, #222222 101.83%);\r\n            border-radius: 20px;\r\n            padding: 15px !important;\r\n            position: relative !important;\r\n        }\r\n        .notification-content{\r\n            display: flex;\r\n            align-items: center;\r\n            position: relative !important;\r\n            z-index: 9;\r\n            gap: 16px;\r\n        }\r\n        .img{\r\n            flex-shrink: 0;\r\n            width: 100px !important;\r\n    line-height: 1 !important;\r\n        }\r\n        .cont{\r\n            flex-grow: 1;\r\n        }\r\n        .bg-pattern{\r\n            position: absolute !important;\r\n            top: 0;\r\n            right: 0;\r\n            z-index: 1;\r\n        }\r\n        .btn-pro{\r\n            font-size: 16px;\r\n            padding: 10px 15px !important;\r\n            background: #FFFFFF1A;\r\n            color: #fff;\r\n            box-shadow: 6px 6px 9px 0px #FFFCFC24 inset, 0px -13px 8px 0px #00000033 inset;\r\n            backdrop-filter: blur(3px);\r\n            border-radius: 10px;\r\ntext-decoration:none !important;\r\n            display: inline-flex;\r\n            align-items: center;\r\n            gap: 8px;\r\ntransition: all .2s ease-in-out;\r\nborder: none !important;\r\n        }\r\n.btn-pro:hover{\r\n  box-shadow: -6px -6px 9px 0px #FFFCFC24 inset, 0px 13px 8px 0px #00000033 inset;\r\n}\r\n        .pro-text{\r\n            color: #9662FF;\r\n        }\r\n\r\n#notification_28 .altumcode-close{\r\n    position: absolute !important;\r\n    top: -5px;\r\n    right: -5px;\r\n}<\/style>\n\n<div id=\"notification_28\" role=\"dialog\" class=\"altumcode-wrapper altumcode-wrapper-rounded    altumcode-custom-html-wrapper\" style='font-family: inherit!important;background-color: #FFFFFF00;border-width: 0px;border-color: #000000;;padding: 5px !important;;--shadow-r: 0;--shadow-g: 0;--shadow-b: 0;'>\n    <div class=\"altumcode-custom-html-content\">\n        <div class=\"altumcode-custom-html-html\">\n            <div class=\"notification-wrapper\">\r\n        <div class=\"notification-content\">\r\n            <div class=\"img\">\r\n                <img src=\"https:\/\/codedthemes.com\/wp-content\/uploads\/edd\/2024\/04\/mantis_pro_bootstrap5-1.webp\" alt=\"images\" style=\"width: 100% !important;\">\r\n            <\/div>\r\n            <div class=\"cont\">\r\n                <a  href=\"https:\/\/links.codedthemes.com\/kcLeg\" target=\"_blank\" class=\"btn-pro\">\r\n                    Unlock more with <span class=\"pro-text\">PRO<\/span>\r\n                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 32 32\" fill=\"none\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\r\n                        <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M17.9587 7.29245C18.1462 7.10519 18.4004 7 18.6654 7C18.9304 7 19.1845 7.10519 19.372 7.29245L27.372 15.2925C27.5593 15.48 27.6645 15.7341 27.6645 15.9991C27.6645 16.2641 27.5593 16.5183 27.372 16.7058L19.372 24.7058C19.2805 24.804 19.1701 24.8828 19.0474 24.9375C18.9248 24.9922 18.7923 25.0215 18.6581 25.0239C18.5238 25.0263 18.3904 25.0016 18.2659 24.9513C18.1414 24.901 18.0283 24.8261 17.9333 24.7312C17.8384 24.6362 17.7635 24.5231 17.7132 24.3986C17.6629 24.2741 17.6382 24.1407 17.6406 24.0064C17.6429 23.8722 17.6723 23.7397 17.727 23.6171C17.7816 23.4944 17.8604 23.384 17.9587 23.2925L24.252 16.9991H5.33203C5.06681 16.9991 4.81246 16.8938 4.62492 16.7062C4.43739 16.5187 4.33203 16.2643 4.33203 15.9991C4.33203 15.7339 4.43739 15.4796 4.62492 15.292C4.81246 15.1045 5.06681 14.9991 5.33203 14.9991H24.252L17.9587 8.70579C17.7714 8.51829 17.6662 8.26412 17.6662 7.99912C17.6662 7.73412 17.7714 7.47995 17.9587 7.29245Z\" fill=\"white\" fill-opacity=\"0.7\"\/>\r\n                    <\/svg>\r\n                <\/a>\r\n            <\/div>\r\n<button class=\"altumcode-close\" style=\"color:#FFFFFF;\">\u00d7<\/button>\r\n        <\/div>\r\n        <div class=\"bg-pattern\">\r\n            <svg width=\"323\" height=\"139\" viewBox=\"0 0 323 139\" fill=\"none\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\r\n                <g opacity=\"0.3\">\r\n                    <path d=\"M207 59.8369C105.4 60.915 39.3333 12.6695 19 -8.8927L355 -19V138C348 111.496 308.6 58.7588 207 59.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M197 49.8369C95.4 50.915 29.3333 2.66953 9 -18.8927L345 -29V128C338 101.496 298.6 48.7588 197 49.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M190 39.8369C88.4 40.915 22.3333 -7.33047 2 -28.8927L338 -39V118C331 91.4964 291.6 38.7588 190 39.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                <\/g>\r\n                <g opacity=\"0.3\">\r\n                    <path d=\"M207 19.8369C105.4 20.915 39.3333 -27.3305 19 -48.8927L355 -59V98C348 71.4964 308.6 18.7588 207 19.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M197 9.83691C95.4 10.915 29.3333 -37.3305 9 -58.8927L345 -69V88C338 61.4964 298.6 8.7588 197 9.83691Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M190 -0.163094C88.4 0.915016 22.3333 -47.3305 2 -68.8927L338 -79V78C331 51.4964 291.6 -1.2412 190 -0.163094Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                <\/g>\r\n            <\/svg>\r\n        <\/div>\r\n\r\n    <\/div>        <\/div>\n\n        <div>\n                            <a href=\"https:\/\/fomo.codedthemes.com\/\" class=\"altumcode-site\" style=\"display: none !important;\"><\/a>\n                    <\/div>\n    <\/div>\n<\/div>\n",
    display_mobile: 1,
    display_desktop: 1,
    display_trigger: "delay",
    display_trigger_value: 2,
    display_delay_type_after_close: "time_on_site",
    display_delay_value_after_close: 21600,
    duration: -1,
    close: true,
    display_frequency: "all_time",
    position: "bottom_right",
    trigger_all_pages: 0,
    triggers: [{"type":"starts_with","value":"https:\/\/mantisdashboard.com\/bootstrap\/free\/"}],
    on_animation: "fadeIn",
    off_animation: "fadeOut",
    animation: "",
    animation_interval: 3,

    notification_id: 28}).initiate();







new AltumCodeManager({
    content: "<style>\n    #notification_30{\r\nwidth: 395px !important;\r\nmax-width: 395px !important;\r\n}\r\n.notification-wrapper{\r\n            Width: 385px !important;\r\n            background: linear-gradient(94.42deg, #484849 -3.37%, #222222 101.83%);\r\n            border-radius: 20px;\r\n            padding: 15px !important;\r\n            position: relative !important;\r\n        }\r\n        .notification-content{\r\n            display: flex;\r\n            align-items: center;\r\n            position: relative !important;\r\n            z-index: 9;\r\n            gap: 16px;\r\n        }\r\n        .img{\r\n            flex-shrink: 0;\r\n            width: 100px !important;\r\n    line-height: 1 !important;\r\n        }\r\n        .cont{\r\n            flex-grow: 1;\r\n        }\r\n        .bg-pattern{\r\n            position: absolute !important;\r\n            top: 0;\r\n            right: 0;\r\n            z-index: 1;\r\n        }\r\n        .btn-pro{\r\n            font-size: 16px;\r\n            padding: 10px 15px !important;\r\n            background: #FFFFFF1A;\r\n            color: #fff;\r\n            box-shadow: 6px 6px 9px 0px #FFFCFC24 inset, 0px -13px 8px 0px #00000033 inset;\r\n            backdrop-filter: blur(3px);\r\n            border-radius: 10px;\r\ntext-decoration:none !important;\r\n            display: inline-flex;\r\n            align-items: center;\r\n            gap: 8px;\r\ntransition: all .2s ease-in-out;\r\nborder: none !important;\r\n        }\r\n.btn-pro:hover{\r\n  box-shadow: -6px -6px 9px 0px #FFFCFC24 inset, 0px 13px 8px 0px #00000033 inset;\r\n}\r\n        .pro-text{\r\n            color: #9662FF;\r\n        }\r\n\r\n#notification_30 .altumcode-close{\r\n    position: absolute !important;\r\n    top: -5px;\r\n    right: -5px;\r\n}<\/style>\n\n<div id=\"notification_30\" role=\"dialog\" class=\"altumcode-wrapper altumcode-wrapper-rounded    altumcode-custom-html-wrapper\" style='font-family: inherit!important;background-color: #FFFFFF00;border-width: 0px;border-color: #000000;;padding: 5px !important;;--shadow-r: 0;--shadow-g: 0;--shadow-b: 0;'>\n    <div class=\"altumcode-custom-html-content\">\n        <div class=\"altumcode-custom-html-html\">\n            <div class=\"notification-wrapper\">\r\n        <div class=\"notification-content\">\r\n            <div class=\"img\">\r\n                <img src=\"https:\/\/codedthemes.com\/wp-content\/uploads\/edd\/2025\/04\/mantis_angular_admin_template.webp\" alt=\"images\" style=\"width: 100% !important;\">\r\n            <\/div>\r\n            <div class=\"cont\">\r\n                <a  href=\"https:\/\/links.codedthemes.com\/QhTvQ\" target=\"_blank\" class=\"btn-pro\">\r\n                    Unlock more with <span class=\"pro-text\">PRO<\/span>\r\n                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 32 32\" fill=\"none\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\r\n                        <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M17.9587 7.29245C18.1462 7.10519 18.4004 7 18.6654 7C18.9304 7 19.1845 7.10519 19.372 7.29245L27.372 15.2925C27.5593 15.48 27.6645 15.7341 27.6645 15.9991C27.6645 16.2641 27.5593 16.5183 27.372 16.7058L19.372 24.7058C19.2805 24.804 19.1701 24.8828 19.0474 24.9375C18.9248 24.9922 18.7923 25.0215 18.6581 25.0239C18.5238 25.0263 18.3904 25.0016 18.2659 24.9513C18.1414 24.901 18.0283 24.8261 17.9333 24.7312C17.8384 24.6362 17.7635 24.5231 17.7132 24.3986C17.6629 24.2741 17.6382 24.1407 17.6406 24.0064C17.6429 23.8722 17.6723 23.7397 17.727 23.6171C17.7816 23.4944 17.8604 23.384 17.9587 23.2925L24.252 16.9991H5.33203C5.06681 16.9991 4.81246 16.8938 4.62492 16.7062C4.43739 16.5187 4.33203 16.2643 4.33203 15.9991C4.33203 15.7339 4.43739 15.4796 4.62492 15.292C4.81246 15.1045 5.06681 14.9991 5.33203 14.9991H24.252L17.9587 8.70579C17.7714 8.51829 17.6662 8.26412 17.6662 7.99912C17.6662 7.73412 17.7714 7.47995 17.9587 7.29245Z\" fill=\"white\" fill-opacity=\"0.7\"\/>\r\n                    <\/svg>\r\n                <\/a>\r\n            <\/div>\r\n<button class=\"altumcode-close\" style=\"color:#FFFFFF;\">\u00d7<\/button>\r\n        <\/div>\r\n        <div class=\"bg-pattern\">\r\n            <svg width=\"323\" height=\"139\" viewBox=\"0 0 323 139\" fill=\"none\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\r\n                <g opacity=\"0.3\">\r\n                    <path d=\"M207 59.8369C105.4 60.915 39.3333 12.6695 19 -8.8927L355 -19V138C348 111.496 308.6 58.7588 207 59.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M197 49.8369C95.4 50.915 29.3333 2.66953 9 -18.8927L345 -29V128C338 101.496 298.6 48.7588 197 49.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M190 39.8369C88.4 40.915 22.3333 -7.33047 2 -28.8927L338 -39V118C331 91.4964 291.6 38.7588 190 39.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                <\/g>\r\n                <g opacity=\"0.3\">\r\n                    <path d=\"M207 19.8369C105.4 20.915 39.3333 -27.3305 19 -48.8927L355 -59V98C348 71.4964 308.6 18.7588 207 19.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M197 9.83691C95.4 10.915 29.3333 -37.3305 9 -58.8927L345 -69V88C338 61.4964 298.6 8.7588 197 9.83691Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M190 -0.163094C88.4 0.915016 22.3333 -47.3305 2 -68.8927L338 -79V78C331 51.4964 291.6 -1.2412 190 -0.163094Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                <\/g>\r\n            <\/svg>\r\n        <\/div>\r\n\r\n    <\/div>        <\/div>\n\n        <div>\n                            <a href=\"https:\/\/fomo.codedthemes.com\/\" class=\"altumcode-site\" style=\"display: none !important;\"><\/a>\n                    <\/div>\n    <\/div>\n<\/div>\n",
    display_mobile: 1,
    display_desktop: 1,
    display_trigger: "delay",
    display_trigger_value: 2,
    display_delay_type_after_close: "time_on_site",
    display_delay_value_after_close: 21600,
    duration: -1,
    close: true,
    display_frequency: "all_time",
    position: "bottom_right",
    trigger_all_pages: 0,
    triggers: [{"type":"starts_with","value":"https:\/\/mantisdashboard.com\/angular\/free\/"}],
    on_animation: "fadeIn",
    off_animation: "fadeOut",
    animation: "",
    animation_interval: 3,

    notification_id: 30}).initiate();







new AltumCodeManager({
    content: "<style>\n    #notification_31{\r\nwidth: 395px !important;\r\nmax-width: 395px !important;\r\n}\r\n.notification-wrapper{\r\n            Width: 385px !important;\r\n            background: linear-gradient(94.42deg, #484849 -3.37%, #222222 101.83%);\r\n            border-radius: 20px;\r\n            padding: 15px !important;\r\n            position: relative !important;\r\n        }\r\n        .notification-content{\r\n            display: flex;\r\n            align-items: center;\r\n            position: relative !important;\r\n            z-index: 9;\r\n            gap: 16px;\r\n        }\r\n        .img{\r\n            flex-shrink: 0;\r\n            width: 100px !important;\r\n    line-height: 1 !important;\r\n        }\r\n        .cont{\r\n            flex-grow: 1;\r\n        }\r\n        .bg-pattern{\r\n            position: absolute !important;\r\n            top: 0;\r\n            right: 0;\r\n            z-index: 1;\r\n        }\r\n        .btn-pro{\r\n            font-size: 16px;\r\n            padding: 10px 15px !important;\r\n            background: #FFFFFF1A;\r\n            color: #fff;\r\n            box-shadow: 6px 6px 9px 0px #FFFCFC24 inset, 0px -13px 8px 0px #00000033 inset;\r\n            backdrop-filter: blur(3px);\r\n            border-radius: 10px;\r\ntext-decoration:none !important;\r\n            display: inline-flex;\r\n            align-items: center;\r\n            gap: 8px;\r\ntransition: all .2s ease-in-out;\r\nborder: none !important;\r\n        }\r\n.btn-pro:hover{\r\n  box-shadow: -6px -6px 9px 0px #FFFCFC24 inset, 0px 13px 8px 0px #00000033 inset;\r\n}\r\n        .pro-text{\r\n            color: #9662FF;\r\n        }\r\n\r\n#notification_31 .altumcode-close{\r\n    position: absolute !important;\r\n    top: -5px;\r\n    right: -5px;\r\n}<\/style>\n\n<div id=\"notification_31\" role=\"dialog\" class=\"altumcode-wrapper altumcode-wrapper-rounded    altumcode-custom-html-wrapper\" style='font-family: inherit!important;background-color: #FFFFFF00;border-width: 0px;border-color: #000000;;padding: 5px !important;;--shadow-r: 0;--shadow-g: 0;--shadow-b: 0;'>\n    <div class=\"altumcode-custom-html-content\">\n        <div class=\"altumcode-custom-html-html\">\n            <div class=\"notification-wrapper\">\r\n        <div class=\"notification-content\">\r\n            <div class=\"img\">\r\n                <img src=\"https:\/\/codedthemes.com\/wp-content\/uploads\/edd\/2024\/04\/mantis_pro_MUI.webp\" alt=\"images\" style=\"width: 100% !important;\">\r\n            <\/div>\r\n            <div class=\"cont\">\r\n                <a  href=\"https:\/\/links.codedthemes.com\/mUuRO\" target=\"_blank\" class=\"btn-pro\">\r\n                    Unlock more with <span class=\"pro-text\">PRO<\/span>\r\n                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 32 32\" fill=\"none\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\r\n                        <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M17.9587 7.29245C18.1462 7.10519 18.4004 7 18.6654 7C18.9304 7 19.1845 7.10519 19.372 7.29245L27.372 15.2925C27.5593 15.48 27.6645 15.7341 27.6645 15.9991C27.6645 16.2641 27.5593 16.5183 27.372 16.7058L19.372 24.7058C19.2805 24.804 19.1701 24.8828 19.0474 24.9375C18.9248 24.9922 18.7923 25.0215 18.6581 25.0239C18.5238 25.0263 18.3904 25.0016 18.2659 24.9513C18.1414 24.901 18.0283 24.8261 17.9333 24.7312C17.8384 24.6362 17.7635 24.5231 17.7132 24.3986C17.6629 24.2741 17.6382 24.1407 17.6406 24.0064C17.6429 23.8722 17.6723 23.7397 17.727 23.6171C17.7816 23.4944 17.8604 23.384 17.9587 23.2925L24.252 16.9991H5.33203C5.06681 16.9991 4.81246 16.8938 4.62492 16.7062C4.43739 16.5187 4.33203 16.2643 4.33203 15.9991C4.33203 15.7339 4.43739 15.4796 4.62492 15.292C4.81246 15.1045 5.06681 14.9991 5.33203 14.9991H24.252L17.9587 8.70579C17.7714 8.51829 17.6662 8.26412 17.6662 7.99912C17.6662 7.73412 17.7714 7.47995 17.9587 7.29245Z\" fill=\"white\" fill-opacity=\"0.7\"\/>\r\n                    <\/svg>\r\n                <\/a>\r\n            <\/div>\r\n<button class=\"altumcode-close\" style=\"color:#FFFFFF;\">\u00d7<\/button>\r\n        <\/div>\r\n        <div class=\"bg-pattern\">\r\n            <svg width=\"323\" height=\"139\" viewBox=\"0 0 323 139\" fill=\"none\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\r\n                <g opacity=\"0.3\">\r\n                    <path d=\"M207 59.8369C105.4 60.915 39.3333 12.6695 19 -8.8927L355 -19V138C348 111.496 308.6 58.7588 207 59.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M197 49.8369C95.4 50.915 29.3333 2.66953 9 -18.8927L345 -29V128C338 101.496 298.6 48.7588 197 49.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M190 39.8369C88.4 40.915 22.3333 -7.33047 2 -28.8927L338 -39V118C331 91.4964 291.6 38.7588 190 39.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                <\/g>\r\n                <g opacity=\"0.3\">\r\n                    <path d=\"M207 19.8369C105.4 20.915 39.3333 -27.3305 19 -48.8927L355 -59V98C348 71.4964 308.6 18.7588 207 19.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M197 9.83691C95.4 10.915 29.3333 -37.3305 9 -58.8927L345 -69V88C338 61.4964 298.6 8.7588 197 9.83691Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M190 -0.163094C88.4 0.915016 22.3333 -47.3305 2 -68.8927L338 -79V78C331 51.4964 291.6 -1.2412 190 -0.163094Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                <\/g>\r\n            <\/svg>\r\n        <\/div>\r\n\r\n    <\/div>        <\/div>\n\n        <div>\n                            <a href=\"https:\/\/fomo.codedthemes.com\/\" class=\"altumcode-site\" style=\"display: none !important;\"><\/a>\n                    <\/div>\n    <\/div>\n<\/div>\n",
    display_mobile: 1,
    display_desktop: 1,
    display_trigger: "delay",
    display_trigger_value: 2,
    display_delay_type_after_close: "time_on_site",
    display_delay_value_after_close: 21600,
    duration: -1,
    close: true,
    display_frequency: "all_time",
    position: "bottom_right",
    trigger_all_pages: 0,
    triggers: [{"type":"starts_with","value":"https:\/\/mantisdashboard.com\/free\/"}],
    on_animation: "fadeIn",
    off_animation: "fadeOut",
    animation: "",
    animation_interval: 3,

    notification_id: 31}).initiate();







new AltumCodeManager({
    content: "<style>\n    #notification_32{\r\nwidth: 395px !important;\r\nmax-width: 395px !important;\r\n}\r\n.notification-wrapper{\r\n            Width: 385px !important;\r\n            background: linear-gradient(94.42deg, #484849 -3.37%, #222222 101.83%);\r\n            border-radius: 20px;\r\n            padding: 15px !important;\r\n            position: relative !important;\r\n        }\r\n        .notification-content{\r\n            display: flex;\r\n            align-items: center;\r\n            position: relative !important;\r\n            z-index: 9;\r\n            gap: 16px;\r\n        }\r\n        .img{\r\n            flex-shrink: 0;\r\n            width: 100px !important;\r\n    line-height: 1 !important;\r\n        }\r\n        .cont{\r\n            flex-grow: 1;\r\n        }\r\n        .bg-pattern{\r\n            position: absolute !important;\r\n            top: 0;\r\n            right: 0;\r\n            z-index: 1;\r\n        }\r\n        .btn-pro{\r\n            font-size: 16px;\r\n            padding: 10px 15px !important;\r\n            background: #FFFFFF1A;\r\n            color: #fff;\r\n            box-shadow: 6px 6px 9px 0px #FFFCFC24 inset, 0px -13px 8px 0px #00000033 inset;\r\n            backdrop-filter: blur(3px);\r\n            border-radius: 10px;\r\ntext-decoration:none !important;\r\n            display: inline-flex;\r\n            align-items: center;\r\n            gap: 8px;\r\ntransition: all .2s ease-in-out;\r\nborder: none !important;\r\n        }\r\n.btn-pro:hover{\r\n  box-shadow: -6px -6px 9px 0px #FFFCFC24 inset, 0px 13px 8px 0px #00000033 inset;\r\n}\r\n        .pro-text{\r\n            color: #9662FF;\r\n        }\r\n\r\n#notification_32 .altumcode-close{\r\n    position: absolute !important;\r\n    top: -5px;\r\n    right: -5px;\r\n}<\/style>\n\n<div id=\"notification_32\" role=\"dialog\" class=\"altumcode-wrapper altumcode-wrapper-rounded    altumcode-custom-html-wrapper\" style='font-family: inherit!important;background-color: #FFFFFF00;border-width: 0px;border-color: #000000;;padding: 5px !important;;--shadow-r: 0;--shadow-g: 0;--shadow-b: 0;'>\n    <div class=\"altumcode-custom-html-content\">\n        <div class=\"altumcode-custom-html-html\">\n            <div class=\"notification-wrapper\">\r\n        <div class=\"notification-content\">\r\n            <div class=\"img\">\r\n                <img src=\"https:\/\/codedthemes.com\/wp-content\/uploads\/edd\/2024\/04\/mantis_vue_pro.webp\" alt=\"images\" style=\"width: 100% !important;\">\r\n            <\/div>\r\n            <div class=\"cont\">\r\n                <a  href=\"https:\/\/links.codedthemes.com\/VVAFe\" target=\"_blank\" class=\"btn-pro\">\r\n                    Unlock more with <span class=\"pro-text\">PRO<\/span>\r\n                    <svg width=\"20\" height=\"20\" viewBox=\"0 0 32 32\" fill=\"none\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\r\n                        <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M17.9587 7.29245C18.1462 7.10519 18.4004 7 18.6654 7C18.9304 7 19.1845 7.10519 19.372 7.29245L27.372 15.2925C27.5593 15.48 27.6645 15.7341 27.6645 15.9991C27.6645 16.2641 27.5593 16.5183 27.372 16.7058L19.372 24.7058C19.2805 24.804 19.1701 24.8828 19.0474 24.9375C18.9248 24.9922 18.7923 25.0215 18.6581 25.0239C18.5238 25.0263 18.3904 25.0016 18.2659 24.9513C18.1414 24.901 18.0283 24.8261 17.9333 24.7312C17.8384 24.6362 17.7635 24.5231 17.7132 24.3986C17.6629 24.2741 17.6382 24.1407 17.6406 24.0064C17.6429 23.8722 17.6723 23.7397 17.727 23.6171C17.7816 23.4944 17.8604 23.384 17.9587 23.2925L24.252 16.9991H5.33203C5.06681 16.9991 4.81246 16.8938 4.62492 16.7062C4.43739 16.5187 4.33203 16.2643 4.33203 15.9991C4.33203 15.7339 4.43739 15.4796 4.62492 15.292C4.81246 15.1045 5.06681 14.9991 5.33203 14.9991H24.252L17.9587 8.70579C17.7714 8.51829 17.6662 8.26412 17.6662 7.99912C17.6662 7.73412 17.7714 7.47995 17.9587 7.29245Z\" fill=\"white\" fill-opacity=\"0.7\"\/>\r\n                    <\/svg>\r\n                <\/a>\r\n            <\/div>\r\n<button class=\"altumcode-close\" style=\"color:#FFFFFF;\">\u00d7<\/button>\r\n        <\/div>\r\n        <div class=\"bg-pattern\">\r\n            <svg width=\"323\" height=\"139\" viewBox=\"0 0 323 139\" fill=\"none\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\r\n                <g opacity=\"0.3\">\r\n                    <path d=\"M207 59.8369C105.4 60.915 39.3333 12.6695 19 -8.8927L355 -19V138C348 111.496 308.6 58.7588 207 59.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M197 49.8369C95.4 50.915 29.3333 2.66953 9 -18.8927L345 -29V128C338 101.496 298.6 48.7588 197 49.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M190 39.8369C88.4 40.915 22.3333 -7.33047 2 -28.8927L338 -39V118C331 91.4964 291.6 38.7588 190 39.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                <\/g>\r\n                <g opacity=\"0.3\">\r\n                    <path d=\"M207 19.8369C105.4 20.915 39.3333 -27.3305 19 -48.8927L355 -59V98C348 71.4964 308.6 18.7588 207 19.8369Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M197 9.83691C95.4 10.915 29.3333 -37.3305 9 -58.8927L345 -69V88C338 61.4964 298.6 8.7588 197 9.83691Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                    <path d=\"M190 -0.163094C88.4 0.915016 22.3333 -47.3305 2 -68.8927L338 -79V78C331 51.4964 291.6 -1.2412 190 -0.163094Z\" stroke=\"#FFFCFC\" stroke-opacity=\"0.3\"\/>\r\n                <\/g>\r\n            <\/svg>\r\n        <\/div>\r\n\r\n    <\/div>        <\/div>\n\n        <div>\n                            <a href=\"https:\/\/fomo.codedthemes.com\/\" class=\"altumcode-site\" style=\"display: none !important;\"><\/a>\n                    <\/div>\n    <\/div>\n<\/div>\n",
    display_mobile: 1,
    display_desktop: 1,
    display_trigger: "delay",
    display_trigger_value: 2,
    display_delay_type_after_close: "time_on_site",
    display_delay_value_after_close: 21600,
    duration: -1,
    close: true,
    display_frequency: "all_time",
    position: "bottom_right",
    trigger_all_pages: 0,
    triggers: [{"type":"starts_with","value":"https:\/\/mantisdashboard.com\/vue\/free\/"}],
    on_animation: "fadeIn",
    off_animation: "fadeOut",
    animation: "",
    animation_interval: 3,

    notification_id: 32}).initiate();







new AltumCodeManager({
    content: "<style>\n    #notification_48{\r\ntext-align: right;\r\n}\r\n.btn-ct{\r\n            display: inline-block;\r\n            background: #000;\r\n            border-radius: 10px;\r\n        }\r\n        .btn-pro{\r\n            font-size: 16px;\r\n            padding: 10px 15px !important;\r\n            background: #FFFFFF1A;\r\n            color: #fff;\r\n            box-shadow: 6px 6px 9px 0px #FFFCFC24 inset, 0px -13px 8px 0px #00000033 inset;\r\n            backdrop-filter: blur(3px);\r\n            border-radius: 10px;\r\n            display: inline-flex;\r\n            align-items: center;\r\n            gap: 8px;\r\n        }\r\n      \r\n.btn-pro:hover{\r\n  box-shadow: -6px -6px 9px 0px #FFFCFC24 inset, 0px 13px 8px 0px #00000033 inset;\r\ntext-decoration : none;\r\ncolor: #c0c5cc;\r\n}<\/style>\n\n<div id=\"notification_48\" role=\"dialog\" class=\"altumcode-wrapper altumcode-wrapper-rounded    altumcode-custom-html-wrapper\" style='font-family: inherit!important;background-color: #FFFFFF00;border-width: 0px;border-color: #000000;;padding: 5px !important;;--shadow-r: 0;--shadow-g: 0;--shadow-b: 0;'>\n    <div class=\"altumcode-custom-html-content\">\n        <div class=\"altumcode-custom-html-html\">\n            <div class=\"btn-ct\">\r\n        <a href=\"https:\/\/links.codedthemes.com\/ZNehy\" class=\"btn-pro\">\r\n            Buy Now \r\n            <svg width=\"20\" height=\"20\" viewBox=\"0 0 32 32\" fill=\"none\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\r\n                <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M17.9587 7.29245C18.1462 7.10519 18.4004 7 18.6654 7C18.9304 7 19.1845 7.10519 19.372 7.29245L27.372 15.2925C27.5593 15.48 27.6645 15.7341 27.6645 15.9991C27.6645 16.2641 27.5593 16.5183 27.372 16.7058L19.372 24.7058C19.2805 24.804 19.1701 24.8828 19.0474 24.9375C18.9248 24.9922 18.7923 25.0215 18.6581 25.0239C18.5238 25.0263 18.3904 25.0016 18.2659 24.9513C18.1414 24.901 18.0283 24.8261 17.9333 24.7312C17.8384 24.6362 17.7635 24.5231 17.7132 24.3986C17.6629 24.2741 17.6382 24.1407 17.6406 24.0064C17.6429 23.8722 17.6723 23.7397 17.727 23.6171C17.7816 23.4944 17.8604 23.384 17.9587 23.2925L24.252 16.9991H5.33203C5.06681 16.9991 4.81246 16.8938 4.62492 16.7062C4.43739 16.5187 4.33203 16.2643 4.33203 15.9991C4.33203 15.7339 4.43739 15.4796 4.62492 15.292C4.81246 15.1045 5.06681 14.9991 5.33203 14.9991H24.252L17.9587 8.70579C17.7714 8.51829 17.6662 8.26412 17.6662 7.99912C17.6662 7.73412 17.7714 7.47995 17.9587 7.29245Z\" fill=\"white\" fill-opacity=\"0.7\"\/>\r\n            <\/svg>\r\n        <\/a>\r\n    \r\n    <\/div>        <\/div>\n\n        <div>\n                            <a href=\"https:\/\/fomo.codedthemes.com\/\" class=\"altumcode-site\" style=\"display: none !important;\"><\/a>\n                    <\/div>\n    <\/div>\n<\/div>\n",
    display_mobile: 1,
    display_desktop: 1,
    display_trigger: "delay",
    display_trigger_value: 2,
    display_delay_type_after_close: "time_on_site",
    display_delay_value_after_close: 21600,
    duration: -1,
    close: true,
    display_frequency: "all_time",
    position: "bottom_right",
    trigger_all_pages: 0,
    triggers: [{"type":"starts_with","value":"https:\/\/mantisdashboard.com\/angular\/default\/"}],
    on_animation: "fadeIn",
    off_animation: "fadeOut",
    animation: "",
    animation_interval: 3,

    notification_id: 48}).initiate();







new AltumCodeManager({
    content: "<style>\n    #notification_49{\r\ntext-align: right;\r\n}\r\n.btn-ct{\r\n            display: inline-block;\r\n            background: #000;\r\n            border-radius: 10px;\r\n        }\r\n        .btn-pro{\r\n            font-size: 16px;\r\n            padding: 10px 15px !important;\r\n            background: #FFFFFF1A;\r\n            color: #fff;\r\n            box-shadow: 6px 6px 9px 0px #FFFCFC24 inset, 0px -13px 8px 0px #00000033 inset;\r\n            backdrop-filter: blur(3px);\r\n            border-radius: 10px;\r\n            display: inline-flex;\r\n            align-items: center;\r\n            gap: 8px;\r\n        }\r\n      \r\n.btn-pro:hover{\r\n  box-shadow: -6px -6px 9px 0px #FFFCFC24 inset, 0px 13px 8px 0px #00000033 inset;\r\ntext-decoration : none;\r\ncolor: #c0c5cc;\r\n}<\/style>\n\n<div id=\"notification_49\" role=\"dialog\" class=\"altumcode-wrapper altumcode-wrapper-rounded    altumcode-custom-html-wrapper\" style='font-family: inherit!important;background-color: #FFFFFF00;border-width: 0px;border-color: #000000;;padding: 5px !important;;--shadow-r: 0;--shadow-g: 0;--shadow-b: 0;'>\n    <div class=\"altumcode-custom-html-content\">\n        <div class=\"altumcode-custom-html-html\">\n            <div class=\"btn-ct\">\r\n        <a href=\"https:\/\/links.codedthemes.com\/OjMxZ\" class=\"btn-pro\">\r\n            Buy Now \r\n            <svg width=\"20\" height=\"20\" viewBox=\"0 0 32 32\" fill=\"none\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\r\n                <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M17.9587 7.29245C18.1462 7.10519 18.4004 7 18.6654 7C18.9304 7 19.1845 7.10519 19.372 7.29245L27.372 15.2925C27.5593 15.48 27.6645 15.7341 27.6645 15.9991C27.6645 16.2641 27.5593 16.5183 27.372 16.7058L19.372 24.7058C19.2805 24.804 19.1701 24.8828 19.0474 24.9375C18.9248 24.9922 18.7923 25.0215 18.6581 25.0239C18.5238 25.0263 18.3904 25.0016 18.2659 24.9513C18.1414 24.901 18.0283 24.8261 17.9333 24.7312C17.8384 24.6362 17.7635 24.5231 17.7132 24.3986C17.6629 24.2741 17.6382 24.1407 17.6406 24.0064C17.6429 23.8722 17.6723 23.7397 17.727 23.6171C17.7816 23.4944 17.8604 23.384 17.9587 23.2925L24.252 16.9991H5.33203C5.06681 16.9991 4.81246 16.8938 4.62492 16.7062C4.43739 16.5187 4.33203 16.2643 4.33203 15.9991C4.33203 15.7339 4.43739 15.4796 4.62492 15.292C4.81246 15.1045 5.06681 14.9991 5.33203 14.9991H24.252L17.9587 8.70579C17.7714 8.51829 17.6662 8.26412 17.6662 7.99912C17.6662 7.73412 17.7714 7.47995 17.9587 7.29245Z\" fill=\"white\" fill-opacity=\"0.7\"\/>\r\n            <\/svg>\r\n        <\/a>\r\n    \r\n    <\/div>        <\/div>\n\n        <div>\n                            <a href=\"https:\/\/fomo.codedthemes.com\/\" class=\"altumcode-site\" style=\"display: none !important;\"><\/a>\n                    <\/div>\n    <\/div>\n<\/div>\n",
    display_mobile: 1,
    display_desktop: 1,
    display_trigger: "delay",
    display_trigger_value: 2,
    display_delay_type_after_close: "time_on_site",
    display_delay_value_after_close: 21600,
    duration: -1,
    close: true,
    display_frequency: "all_time",
    position: "bottom_right",
    trigger_all_pages: 0,
    triggers: [{"type":"starts_with","value":"https:\/\/mantisdashboard.com\/bootstrap\/default\/"}],
    on_animation: "fadeIn",
    off_animation: "fadeOut",
    animation: "",
    animation_interval: 3,

    notification_id: 49}).initiate();







new AltumCodeManager({
    content: "<style>\n    #notification_50{\r\ntext-align: right;\r\n}\r\n.btn-ct{\r\n            display: inline-block;\r\n            background: #000;\r\n            border-radius: 10px;\r\n        }\r\n        .btn-pro{\r\n            font-size: 16px;\r\n            padding: 10px 15px !important;\r\n            background: #FFFFFF1A;\r\n            color: #fff;\r\n            box-shadow: 6px 6px 9px 0px #FFFCFC24 inset, 0px -13px 8px 0px #00000033 inset;\r\n            backdrop-filter: blur(3px);\r\n            border-radius: 10px;\r\n            display: inline-flex;\r\n            align-items: center;\r\n            gap: 8px;\r\ntext-decoration : none;\r\n        }\r\n      \r\n.btn-pro:hover{\r\n  box-shadow: -6px -6px 9px 0px #FFFCFC24 inset, 0px 13px 8px 0px #00000033 inset;\r\ntext-decoration : none;\r\ncolor: #c0c5cc;\r\n}<\/style>\n\n<div id=\"notification_50\" role=\"dialog\" class=\"altumcode-wrapper altumcode-wrapper-rounded    altumcode-custom-html-wrapper\" style='font-family: inherit!important;background-color: #FFFFFF00;border-width: 0px;border-color: #000000;;padding: 5px !important;;--shadow-r: 0;--shadow-g: 0;--shadow-b: 0;'>\n    <div class=\"altumcode-custom-html-content\">\n        <div class=\"altumcode-custom-html-html\">\n            <div class=\"btn-ct\">\r\n        <a href=\"https:\/\/links.codedthemes.com\/FFmdZ\" target=\"_blank\" class=\"btn-pro\">\r\n            Buy Now \r\n            <svg width=\"20\" height=\"20\" viewBox=\"0 0 32 32\" fill=\"none\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\r\n                <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M17.9587 7.29245C18.1462 7.10519 18.4004 7 18.6654 7C18.9304 7 19.1845 7.10519 19.372 7.29245L27.372 15.2925C27.5593 15.48 27.6645 15.7341 27.6645 15.9991C27.6645 16.2641 27.5593 16.5183 27.372 16.7058L19.372 24.7058C19.2805 24.804 19.1701 24.8828 19.0474 24.9375C18.9248 24.9922 18.7923 25.0215 18.6581 25.0239C18.5238 25.0263 18.3904 25.0016 18.2659 24.9513C18.1414 24.901 18.0283 24.8261 17.9333 24.7312C17.8384 24.6362 17.7635 24.5231 17.7132 24.3986C17.6629 24.2741 17.6382 24.1407 17.6406 24.0064C17.6429 23.8722 17.6723 23.7397 17.727 23.6171C17.7816 23.4944 17.8604 23.384 17.9587 23.2925L24.252 16.9991H5.33203C5.06681 16.9991 4.81246 16.8938 4.62492 16.7062C4.43739 16.5187 4.33203 16.2643 4.33203 15.9991C4.33203 15.7339 4.43739 15.4796 4.62492 15.292C4.81246 15.1045 5.06681 14.9991 5.33203 14.9991H24.252L17.9587 8.70579C17.7714 8.51829 17.6662 8.26412 17.6662 7.99912C17.6662 7.73412 17.7714 7.47995 17.9587 7.29245Z\" fill=\"white\" fill-opacity=\"0.7\"\/>\r\n            <\/svg>\r\n        <\/a>\r\n    \r\n    <\/div>        <\/div>\n\n        <div>\n                            <a href=\"https:\/\/fomo.codedthemes.com\/\" class=\"altumcode-site\" style=\"display: none !important;\"><\/a>\n                    <\/div>\n    <\/div>\n<\/div>\n",
    display_mobile: 1,
    display_desktop: 1,
    display_trigger: "delay",
    display_trigger_value: 2,
    display_delay_type_after_close: "time_on_site",
    display_delay_value_after_close: 21600,
    duration: -1,
    close: true,
    display_frequency: "all_time",
    position: "bottom_right",
    trigger_all_pages: 0,
    triggers: [{"type":"starts_with","value":"https:\/\/mantisdashboard.com\/vue\/dashboard\/default"}],
    on_animation: "fadeIn",
    off_animation: "fadeOut",
    animation: "",
    animation_interval: 3,

    notification_id: 50}).initiate();







new AltumCodeManager({
    content: "<style>\n    #notification_51{\r\ntext-align: right;\r\n}\r\n.btn-ct{\r\n            display: inline-block;\r\n            background: #000;\r\n            border-radius: 10px;\r\n        }\r\n        .btn-pro{\r\n            font-size: 16px;\r\n            padding: 10px 15px !important;\r\n            background: #FFFFFF1A;\r\n            color: #fff;\r\n            box-shadow: 6px 6px 9px 0px #FFFCFC24 inset, 0px -13px 8px 0px #00000033 inset;\r\n            backdrop-filter: blur(3px);\r\n            border-radius: 10px;\r\n            display: inline-flex;\r\n            align-items: center;\r\n            gap: 8px;\r\ntext-decoration : none;\r\n        }\r\n      \r\n.btn-pro:hover{\r\n  box-shadow: -6px -6px 9px 0px #FFFCFC24 inset, 0px 13px 8px 0px #00000033 inset;\r\ntext-decoration : none;\r\ncolor: #c0c5cc;\r\n}<\/style>\n\n<div id=\"notification_51\" role=\"dialog\" class=\"altumcode-wrapper altumcode-wrapper-rounded    altumcode-custom-html-wrapper\" style='font-family: inherit!important;background-color: #FFFFFF00;border-width: 0px;border-color: #000000;;padding: 5px !important;;--shadow-r: 0;--shadow-g: 0;--shadow-b: 0;'>\n    <div class=\"altumcode-custom-html-content\">\n        <div class=\"altumcode-custom-html-html\">\n            <div class=\"btn-ct\">\r\n        <a href=\"https:\/\/links.codedthemes.com\/OECDd\" target=\"_blank\" class=\"btn-pro\">\r\n            Buy Now \r\n            <svg width=\"20\" height=\"20\" viewBox=\"0 0 32 32\" fill=\"none\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\r\n                <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M17.9587 7.29245C18.1462 7.10519 18.4004 7 18.6654 7C18.9304 7 19.1845 7.10519 19.372 7.29245L27.372 15.2925C27.5593 15.48 27.6645 15.7341 27.6645 15.9991C27.6645 16.2641 27.5593 16.5183 27.372 16.7058L19.372 24.7058C19.2805 24.804 19.1701 24.8828 19.0474 24.9375C18.9248 24.9922 18.7923 25.0215 18.6581 25.0239C18.5238 25.0263 18.3904 25.0016 18.2659 24.9513C18.1414 24.901 18.0283 24.8261 17.9333 24.7312C17.8384 24.6362 17.7635 24.5231 17.7132 24.3986C17.6629 24.2741 17.6382 24.1407 17.6406 24.0064C17.6429 23.8722 17.6723 23.7397 17.727 23.6171C17.7816 23.4944 17.8604 23.384 17.9587 23.2925L24.252 16.9991H5.33203C5.06681 16.9991 4.81246 16.8938 4.62492 16.7062C4.43739 16.5187 4.33203 16.2643 4.33203 15.9991C4.33203 15.7339 4.43739 15.4796 4.62492 15.292C4.81246 15.1045 5.06681 14.9991 5.33203 14.9991H24.252L17.9587 8.70579C17.7714 8.51829 17.6662 8.26412 17.6662 7.99912C17.6662 7.73412 17.7714 7.47995 17.9587 7.29245Z\" fill=\"white\" fill-opacity=\"0.7\"\/>\r\n            <\/svg>\r\n        <\/a>\r\n    \r\n    <\/div>        <\/div>\n\n        <div>\n                            <a href=\"https:\/\/fomo.codedthemes.com\/\" class=\"altumcode-site\" style=\"display: none !important;\"><\/a>\n                    <\/div>\n    <\/div>\n<\/div>\n",
    display_mobile: 1,
    display_desktop: 1,
    display_trigger: "delay",
    display_trigger_value: 2,
    display_delay_type_after_close: "time_on_site",
    display_delay_value_after_close: 21600,
    duration: -1,
    close: true,
    display_frequency: "all_time",
    position: "bottom_right",
    trigger_all_pages: 0,
    triggers: [{"type":"starts_with","value":"https:\/\/mantisdashboard.com\/"},{"type":"not_contains","value":"\/vue"},{"type":"not_contains","value":"\/codeignitor"},{"type":"not_contains","value":"\/angular"},{"type":"not_contains","value":"\/bootstrap"},{"type":"not_contains","value":"\/free"}],
    on_animation: "fadeIn",
    off_animation: "fadeOut",
    animation: "",
    animation_interval: 3,

    notification_id: 51}).initiate();







new AltumCodeManager({
    content: "<style>\n    #notification_52{\r\ntext-align: right;\r\n}\r\n.btn-ct{\r\n            display: inline-block;\r\n            background: #000;\r\n            border-radius: 10px;\r\n        }\r\n        .btn-pro{\r\n            font-size: 16px;\r\n            padding: 10px 15px !important;\r\n            background: #FFFFFF1A;\r\n            color: #fff;\r\n            box-shadow: 6px 6px 9px 0px #FFFCFC24 inset, 0px -13px 8px 0px #00000033 inset;\r\n            backdrop-filter: blur(3px);\r\n            border-radius: 10px;\r\n            display: inline-flex;\r\n            align-items: center;\r\n            gap: 8px;\r\ntext-decoration : none;\r\n        }\r\n      \r\n.btn-pro:hover{\r\n  box-shadow: -6px -6px 9px 0px #FFFCFC24 inset, 0px 13px 8px 0px #00000033 inset;\r\ntext-decoration : none;\r\ncolor: #c0c5cc;\r\n}<\/style>\n\n<div id=\"notification_52\" role=\"dialog\" class=\"altumcode-wrapper altumcode-wrapper-rounded    altumcode-custom-html-wrapper\" style='font-family: inherit!important;background-color: #FFFFFF00;border-width: 0px;border-color: #000000;;padding: 5px !important;;--shadow-r: 0;--shadow-g: 0;--shadow-b: 0;'>\n    <div class=\"altumcode-custom-html-content\">\n        <div class=\"altumcode-custom-html-html\">\n            <div class=\"btn-ct\">\r\n        <a href=\"https:\/\/links.codedthemes.com\/QAmUT\" target=\"_blank\" class=\"btn-pro\">\r\n            Buy Now \r\n            <svg width=\"20\" height=\"20\" viewBox=\"0 0 32 32\" fill=\"none\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\r\n                <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M17.9587 7.29245C18.1462 7.10519 18.4004 7 18.6654 7C18.9304 7 19.1845 7.10519 19.372 7.29245L27.372 15.2925C27.5593 15.48 27.6645 15.7341 27.6645 15.9991C27.6645 16.2641 27.5593 16.5183 27.372 16.7058L19.372 24.7058C19.2805 24.804 19.1701 24.8828 19.0474 24.9375C18.9248 24.9922 18.7923 25.0215 18.6581 25.0239C18.5238 25.0263 18.3904 25.0016 18.2659 24.9513C18.1414 24.901 18.0283 24.8261 17.9333 24.7312C17.8384 24.6362 17.7635 24.5231 17.7132 24.3986C17.6629 24.2741 17.6382 24.1407 17.6406 24.0064C17.6429 23.8722 17.6723 23.7397 17.727 23.6171C17.7816 23.4944 17.8604 23.384 17.9587 23.2925L24.252 16.9991H5.33203C5.06681 16.9991 4.81246 16.8938 4.62492 16.7062C4.43739 16.5187 4.33203 16.2643 4.33203 15.9991C4.33203 15.7339 4.43739 15.4796 4.62492 15.292C4.81246 15.1045 5.06681 14.9991 5.33203 14.9991H24.252L17.9587 8.70579C17.7714 8.51829 17.6662 8.26412 17.6662 7.99912C17.6662 7.73412 17.7714 7.47995 17.9587 7.29245Z\" fill=\"white\" fill-opacity=\"0.7\"\/>\r\n            <\/svg>\r\n        <\/a>\r\n    \r\n    <\/div>        <\/div>\n\n        <div>\n                            <a href=\"https:\/\/fomo.codedthemes.com\/\" class=\"altumcode-site\" style=\"display: none !important;\"><\/a>\n                    <\/div>\n    <\/div>\n<\/div>\n",
    display_mobile: 1,
    display_desktop: 1,
    display_trigger: "delay",
    display_trigger_value: 2,
    display_delay_type_after_close: "time_on_site",
    display_delay_value_after_close: 21600,
    duration: -1,
    close: true,
    display_frequency: "all_time",
    position: "bottom_right",
    trigger_all_pages: 0,
    triggers: [{"type":"starts_with","value":"https:\/\/mantis-dotnet.azurewebsites.net\/"}],
    on_animation: "fadeIn",
    off_animation: "fadeOut",
    animation: "",
    animation_interval: 3,

    notification_id: 52}).initiate();







new AltumCodeManager({
    content: "<style>\n    #notification_53{\r\ntext-align: right;\r\n}\r\n.btn-ct{\r\n            display: inline-block;\r\n            background: #000;\r\n            border-radius: 10px;\r\n        }\r\n        .btn-pro{\r\n            font-size: 16px;\r\n            padding: 10px 15px !important;\r\n            background: #FFFFFF1A;\r\n            color: #fff;\r\n            box-shadow: 6px 6px 9px 0px #FFFCFC24 inset, 0px -13px 8px 0px #00000033 inset;\r\n            backdrop-filter: blur(3px);\r\n            border-radius: 10px;\r\n            display: inline-flex;\r\n            align-items: center;\r\n            gap: 8px;\r\ntext-decoration : none;\r\n        }\r\n      \r\n.btn-pro:hover{\r\n  box-shadow: -6px -6px 9px 0px #FFFCFC24 inset, 0px 13px 8px 0px #00000033 inset;\r\ntext-decoration : none;\r\ncolor: #c0c5cc;\r\n}<\/style>\n\n<div id=\"notification_53\" role=\"dialog\" class=\"altumcode-wrapper altumcode-wrapper-rounded    altumcode-custom-html-wrapper\" style='font-family: inherit!important;background-color: #FFFFFF00;border-width: 0px;border-color: #000000;;padding: 5px !important;;--shadow-r: 0;--shadow-g: 0;--shadow-b: 0;'>\n    <div class=\"altumcode-custom-html-content\">\n        <div class=\"altumcode-custom-html-html\">\n            <div class=\"btn-ct\">\r\n        <a href=\"https:\/\/links.codedthemes.com\/LBfwT\" target=\"_blank\" class=\"btn-pro\">\r\n            Buy Now \r\n            <svg width=\"20\" height=\"20\" viewBox=\"0 0 32 32\" fill=\"none\" xmlns=\"http:\/\/www.w3.org\/2000\/svg\">\r\n                <path fill-rule=\"evenodd\" clip-rule=\"evenodd\" d=\"M17.9587 7.29245C18.1462 7.10519 18.4004 7 18.6654 7C18.9304 7 19.1845 7.10519 19.372 7.29245L27.372 15.2925C27.5593 15.48 27.6645 15.7341 27.6645 15.9991C27.6645 16.2641 27.5593 16.5183 27.372 16.7058L19.372 24.7058C19.2805 24.804 19.1701 24.8828 19.0474 24.9375C18.9248 24.9922 18.7923 25.0215 18.6581 25.0239C18.5238 25.0263 18.3904 25.0016 18.2659 24.9513C18.1414 24.901 18.0283 24.8261 17.9333 24.7312C17.8384 24.6362 17.7635 24.5231 17.7132 24.3986C17.6629 24.2741 17.6382 24.1407 17.6406 24.0064C17.6429 23.8722 17.6723 23.7397 17.727 23.6171C17.7816 23.4944 17.8604 23.384 17.9587 23.2925L24.252 16.9991H5.33203C5.06681 16.9991 4.81246 16.8938 4.62492 16.7062C4.43739 16.5187 4.33203 16.2643 4.33203 15.9991C4.33203 15.7339 4.43739 15.4796 4.62492 15.292C4.81246 15.1045 5.06681 14.9991 5.33203 14.9991H24.252L17.9587 8.70579C17.7714 8.51829 17.6662 8.26412 17.6662 7.99912C17.6662 7.73412 17.7714 7.47995 17.9587 7.29245Z\" fill=\"white\" fill-opacity=\"0.7\"\/>\r\n            <\/svg>\r\n        <\/a>\r\n    \r\n    <\/div>        <\/div>\n\n        <div>\n                            <a href=\"https:\/\/fomo.codedthemes.com\/\" class=\"altumcode-site\" style=\"display: none !important;\"><\/a>\n                    <\/div>\n    <\/div>\n<\/div>\n",
    display_mobile: 1,
    display_desktop: 1,
    display_trigger: "delay",
    display_trigger_value: 2,
    display_delay_type_after_close: "time_on_site",
    display_delay_value_after_close: 21600,
    duration: -1,
    close: true,
    display_frequency: "all_time",
    position: "bottom_right",
    trigger_all_pages: 0,
    triggers: [{"type":"starts_with","value":"https:\/\/mantisdashboard.com\/codeignitor\/default\/public\/"}],
    on_animation: "fadeIn",
    off_animation: "fadeOut",
    animation: "",
    animation_interval: 3,

    notification_id: 53}).initiate();


    /* Send basic tracking data */
    send_tracking_data({type: 'track'});
})();

