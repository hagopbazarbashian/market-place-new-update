@extends('layouts.app')
@section('content') 
<style>
    #main{
        position: relative;
        clear: both;
        width: 1140px;
        max-width: 1200px;  
        margin: auto;
        padding: 0;
    }
    #crumb{
        display: flex;
        align-items: center;
        height: 46px;
    }
    #crumb ol{
        color: #666;
    flex: 1;
    margin: 0;
    padding: 0;
    list-style: none;
    }
    td, tr, p, ul, ol, li, input, select, span{
        font-family: 'Noto Sans Armenian','Open Sans','lucida grande',tahoma,arial,sans-serif;
    font-size: 15px;
    margin-left: 0;
    }
    ol{
        display: block;
    list-style-type: decimal;
    margin-block-start: 1em;
    margin-block-end: 1em;
    margin-inline-start: 0px;
    margin-inline-end: 0px;
    padding-inline-start: 40px;
    }
    #crumb li, #crumb span{
        font-size: 12px;
    color: #666;
    line-height: 46px;
    display: inline;
    }
    li{
        margin-bottom: 8px;
    }
    #crumb ol{
        color: #666;
    flex: 1;
    margin: 0;
    padding: 0;
    list-style: none;
    }
    a, a:visited{
        color: #222;
    text-decoration: none;
    transition: color .2s,background-color .2s;
    }
    #pagecol{
        display: flex;
    }
    #menul{
        width: 280px;
    margin-right: 20px;
    text-align: center;
    }
    .ftoggle, .filterbtn, #ph .b .st, .ui-helper-hidden{
        display: none;
    }
    #menul .filter{
        font-size: 12px;
    position: relative;
    margin: 0 0 10px;
    text-align: left;
    border-radius: 8px;
    box-shadow: 0 1px 3px 0 rgb(0 0 0 / 8%);
    }
    #contentr{
        position: relative;
    flex: 1;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 1px 3px 0 rgb(0 0 0 / 8%);
    }
    .dlmsg, .dlpayh, .dlbundles, .dlbp{
        display: flex;
    flex-direction: column;
    }
    .dlmsg>a, .dlpayh>span, .dlbundles>span, .dlbundles>div, .dlbp>a{
        color: #222;
    display: flex;
    align-items: center;
    padding: 16px 20px;
    border-bottom: 1px solid #f2f2f2;
    transition: color .2s;
    }
    .dlbp>a>img{
        width: 120px;
    height: 120px;
    margin-right: 20px;
    border-radius: 16px;
    box-shadow: 0 0 4px 4px rgb(200 200 200 / 20%);
    }
    .dlbp>a>div>div:first-child{
        font-size: 16px;
    font-weight: bold;
    color: #333;
    transition: all 0.2s;
    }
    .dlbp>a>div>div:nth-child(2){
        font-size: 14px;
    color: #999;
    margin-top: 6px;
    }
    .dlbp>a>div>div:nth-child(3){
        display: flex;
    margin-top: 10px;
    }
    .dlbp>a>div>div:nth-child(3)>div{
        font-size: 15px;
    color: #444;
    margin-right: 16px;
    }
    .dlbp>a>div>div.r{
        margin-top: 10px;
    }
    .stars{
  font-size: var(--size);
  display: inline-block;
  align-items: center;
  --percent: calc(var(--rating) / 5 * 10%);
  --px: calc(var(--rating) / 10 * var(--size) + var(--ratingfloor) * (var(--size) * 0.1875));
  margin-right: calc(var(--size) * 0.1875 * -1);
  line-height: 1;
}
.stars::before{
    content: "★★★★★";
    letter-spacing: calc(var(--size) * 0.1875);
    background-clip: text;
}
#menul .filter form .section.cat:only-child{
    padding-bottom: 10px;
}
#menul .filter form .section.cat:first-child{
    border-radius: 8px;
}
#menul .filter form .section.cat{
    border-bottom: none;
    border-radius: 0 0 8px 8px;
}
#menul .filter .section:first-child{
    margin-top: 0;
    border-top: none;
    border-radius: 8px 8px 0 0;

}
#menul .filter .section{
    margin: 6px 0;
    padding: 0 10px;
    border-top: 1px solid #f2f2f2;
    border-bottom: 1px solid #f2f2f2;
    background-color: #fff;
}
#menul .filter div.title{
    font-size: 14px;
    font-weight: bold;
    color: #444;
    padding: 10px 0;
    text-align: left;
}
#menul .filter .cat>a.p{
    font-size: 13px;
    display: block;
    margin: 10px 0 0 8px;
}
@media only screen and (min-width: 320px) and (max-width: 767px){
    a.filterbtn{
        font-size: 16px;
    color: #666;
    display: flex;
    align-items: center;
    max-width: 150px;
    height: 48px;
    padding: 0 0 0 10px;
    text-align: left;
    }
    #menul .filter{
        position: fixed;   
    z-index: 999;
    top: 0;
    right: 0;
    bottom: 0;
    left: 0;
    display: none;
    flex-direction: column;
    width: auto;
    margin: 0;
    padding: 0 0 6px 0;
    border: none;
    border-radius: 0;
    background-color: #f7f7f7;
    box-shadow: none;
    }
    #contentr{
    float: none;
    width: auto;
    margin: 0;
    padding: 0;
    border: none;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
    border-radius: 0;
    box-shadow: none;
    }
    .dlbp>a{
        align-items: flex-start;
    }
    .dlbp>a>img{
        width: 72px;
    height: 72px;
    }
    #main{
        position: static;
    width: 100%;
    max-width: 830px;
    margin: auto;
    border: none;
    border-radius: 0;
    background-color: transparent;
}
    }
   

</style>
<div id="main">
    <div id="pagecol">
        <div id="contentr">
            <div class="dlbp">
                @foreach ($businesspages as $businesspage)
                <a href="">
                    <img src="/logobusines/{{ $businesspage->logobusiness }}" />
                    <div>
                        <div>Elite plus realty</div>
                        <div>ՄԵՐ ԲՈԼՈՐ ՀԱՅՏԱՐԱՐՈՒԹՅՈՒՆՆԵՐԸ Բնակարանների առք, վաճառք, վարձակալություն․․․</div>
                        <div>
                            <div>290 ads</div>
                            <div>28 followers</div>
                        </div>
                        <div class="r"><div class="stars" style="--size: 16px; --rating: 41; --ratingfloor: 4;"></div></div>
                    </div>
                </a>
                @endforeach
                <div class="dlf">
                    &nbsp;
                    <span class="pp"><span class="c">1</span><a href="/pages?pg=2">2</a><a href="/pages?pg=3">3</a><a href="/pages?pg=4">4</a><a href="/pages?pg=5">5</a><a href="/pages?pg=6">6</a><a href="/pages?pg=7">7</a></span> &nbsp;
                    <a href="/pages?pg=2">Next &gt;</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
