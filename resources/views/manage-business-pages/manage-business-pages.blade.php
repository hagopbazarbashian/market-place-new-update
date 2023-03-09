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
    #main>#sstar{
    top: 64px;
    left: -50px;
    }
    #main>#sstar{
    position: absolute;
    top: 4px;
    width: 28px;
    height: 28px;
    padding: 0;
    }
    #star, #sstar{
        position: absolute;
    cursor: pointer;
    }
    #main>#sstar div{
        width: 28px;
    height: 28px;
    background-size: 82px 82px;
    }
    #star .off, #sstar .off{
        background: url(/img/p.png) -54px -23px;
    background-size: 120px 120px;
    transition: transform .1s;
    }
    #main>.share{
        position: absolute;
    width: 28px;
    margin: 120px 0 0 -50px;
    }
    .share .c{
        display: inline-block;
    }
    .share .c a:nth-child(1){
        background-color: #39579a;
    }
    .share .c a{
        font-size: 17px;
    color: #999;
    line-height: 22px;
    display: inline-block;
    width: 22px;
    height: 22px;
    margin: 0 3px;
    text-align: center;
    border-radius: 4px;
    background-image: url(/img/psp.png);
    background-size: 200px 108px;
    -webkit-transition: -webkit-filter 200ms linear; 
    }
    #puheader>.head{
        margin: 0 0 16px 0;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 1px 3px 0 rgb(0 0 0 / 8%);
    }
    #puheader>.head>.bnr img{
        width: 1140px;
    height: 228px;
    border-radius: 8px 8px 0 0;
    object-fit: cover;
    }
    #puheader>.head>.i{
        display: flex;
    align-items: flex-start;
    flex-direction: row;
    justify-content: space-between;
    margin-top: -10px;
    padding: 0 20px 16px;
    }
    #puheader>.head>.i>.l{
        display: flex;
    align-items: center;
    flex-direction: row;
    }
    #puheader>.head>.i>.l>.l, #puheader>.head>.i>.l>.lav{
        margin-right: 20px;
    }
    #puheader>.head>.i>.l>.l img{
        width: 144px;
    height: 144px;
    border-radius: 16px;
    box-shadow: 0 0 4px 4px rgb(200 200 200 / 20%);
    }
    #puheader>.head>.i>.l>.n{
        margin-top: 10px;
    }
    #puheader>.head>.i>.l>.n>div:first-child{
        font-size: 26px;
    overflow: hidden;
    max-width: 420px;
    height: 40px;
    white-space: nowrap;
    text-overflow: ellipsis;
    }
    #puheader>.head>.i>.l>.n>.st{
        display: flex;
    margin-top: 4px;
    }
    #puheader>.head>.i>.l>.n>.st>div{
        font-size: 14px;
    color: #666;
    margin-right: 16px;
    }
    #puheader>.head>.i>.l>.n>.r{
        margin-top: 16px;
    display: flex;
    }
    #puheader>.head>.i>.l>.n>.r a{
        display: flex;
    align-items: center;
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
        content: '★★★★★';
    letter-spacing: calc(var(--size) * 0.1875);
    background: linear-gradient(90deg,#fece1f var(--px),#dadada var(--px));
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    }
    #puheader>.head>.i>.l>.n>.r a .i{
        font-size: 14px;
    color: #888;
    margin-left: 6px;
    text-align: center;
    }
    #puheader>.head>.i>.l>.n>.r>.btn{
        font-size: 15px;
    color: #0c72ea;
    display: inline-block;
    padding: 4px 14px;
    cursor: pointer;
    transition: all 0.2s;
    border-radius: 16px;
    margin-left: 6px;
    }
    #puheader>.head>.i>.r{
        display: flex;
    flex-direction: column;
    justify-content: flex-end;
    }
    #puheader>.head>.i>.r>.h{
        font-size: 15px;
    display: flex;
    align-items: flex-end;
    flex-direction: column;
    margin: 20px 0;
    }
    #puheader>.head>.i>.r>.h .addr{
        background-image: url(/img/page_location.png);
    }
    #puheader>.head>.i>.r>.h .addr, #puheader>.head>.i>.r>.h>.hrs{
        flex: 1;
    margin: 4px 0;
    padding-left: 24px;
    white-space: nowrap;
    text-overflow: ellipsis;
    background-repeat: no-repeat;
    background-position: 0 center;
    background-size: 16px 16px;
    }
    #puheader>.head>.i>.r>.h .addr span, #puheader>.head>.i>.r>.h .hrs span{
        font-size: 15px;
    color: #444;
    display: inline-block;
    overflow: hidden;
    max-width: 320px;
    white-space: nowrap;
    text-decoration: none;
    text-overflow: ellipsis;
    border-top: 1px dotted transparent;
    border-bottom: 1px dotted #999;
    transition: all 0.2s;
    }
    #puheader>.head>.i>.r>.bp{
        display: flex;
    justify-content: flex-end;
    }
    #puheader>.head>.i>.r>.bp a{
        font-size: 15px;
    color: #444;
    display: inline-block;
    min-width: 90px;
    margin-left: 12px;
    padding: 5px 30px;
    cursor: pointer;
    border-radius: 20px;
    background-color: #fff;
    transition: color .4s,background-color .4s;
    -webkit-transition: -webkit-filter 200ms linear;
    }
    #puheader>.about{
        font-size: 15px;
    color: #444;
    margin: 0 0 16px 0;
    padding: 12px 16px;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 1px 3px 0 rgb(0 0 0 / 8%); 
    }
    #puheader>.news{
        font-size: 14px;
    font-style: italic;
    color: #222;
    margin: 0 0 16px 0;
    padding: 12px 16px;
    border-radius: 8px;
    background-color: #ffc;
    box-shadow: 0 1px 3px 0 rgb(0 0 0 / 8%);
    }
    #pagecol{
        display: flex;
    }
    #contentr{
        position: relative;
    flex: 1;
    border-radius: 8px;
    background-color: #fff;
    box-shadow: 0 1px 3px 0 rgb(0 0 0 / 8%);
    }
    div.dl, div.dle .l{
        display: flex;
    flex-direction: column;
    width: 100%;

    }
    .dlsearch{
        padding: 16px 20px;
    border-bottom: 1px solid #efefef;
    }
    .dlsearch form{
        box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding: 0;
    text-align: right;
    }
    .dl .gl{
        display: flex;
    flex-wrap: wrap;
    justify-content: space-around;
    padding: 0 10px;
    }
    .dl .gl a{
        font-size: 12px;
    position: relative;
    display: inline-block;
    width: 250px;
    height: auto;
    margin: 10px 0;
    vertical-align: top;
    transition: color 0.2s;
    -webkit-transition: -webkit-filter 200ms linear;
    }
    .gl a img[src], .dlrel img[src], .featured .c>a>img[src], .dl td.r img[src]{
        visibility: visible;
    }
    .dl .gl a>img{
        width: 250px;
    height: 185px;
    margin-bottom: 6px;
    border-radius: 8px;
    object-fit: cover;
    }
    .dl .gl a>.p{
        font-size: 16px;
    font-weight: 700;
    color: #222;
    margin-bottom: 3px;
    }
    .dl .gl a>.l{
        font-size: 15px;
    color: #222;
    line-height: 1.4;
    display: -webkit-box;
    overflow: hidden;
    max-height: 64px;
    text-align: left;
    text-overflow: ellipsis;
    -webkit-line-clamp: 3;
    -webkit-box-orient: vertical;
    }
    .div.dl>a:first-of-type{
        border: none;
    border-radius: 8px 8px 0 0;
    }

</style>
<div id="main">
    <div id="sstar"><div class="off" onclick="saved.saveUser(2139261)" original-title="Add to Favorites"></div></div>
    <div class="share">
        <div class="c">
            <a target="share" href="#" onclick="ga('send','event','share','facebook');return dlgw('https://www.facebook.com/share.php?u=https://www.list.am/user/2139261',560,430);" original-title="Facebook"></a>
            <a target="share" href="#" onclick="ga('send','event','share','vkontakte');return dlgw('https://vkontakte.ru/share.php?url=https://www.list.am/user/2139261',560,430);" original-title="В Контакте"></a>
            <a target="share" href="#" onclick="ga('send','event','share','odkl');return dlgw('https://connect.ok.ru/offer?url=https://www.list.am/user/2139261',560,430);" original-title="Одноклассники"></a>
            <a
                href="#"
                onclick="ga('send','event','share','mail');dlgo('Send to a Friend','/?w=9&amp;url=https%3A%2F%2Fwww.list.am%2Fuser%2F2139261&amp;t=Calibri+Real+Estate+Agency+-+List.am',500);return false;"
                original-title="Send to a Friend"
            ></a>
        </div>
    </div>
    <div id="puheader">
        <div class="head">
            <div class="bnr"><img src="https://upa.list.am/5573.jpg" original-title="" /></div>
            <div class="i">
                <div class="l">
                    <div class="l"><img src="https://upa.list.am/5574.jpg" original-title="" /></div>
                    <div class="n">
                        <div>Calibri Real Estate Agency</div>
                        <div class="st">
                            <div>582 ads</div>
                            <div>84 followers</div>
                        </div>
                        <div class="r">
                            <a href="/reviews/2139261" original-title="Overall rating: 4.9">
                                <div class="stars" style="--size: 18px; --rating: 49; --ratingfloor: 4;"></div>
                                <div class="i">18 reviews</div>
                            </a>
                            <div class="btn"><span onclick="dlgo('Write a Review','/?w=42&amp;i=2139261',560);return false;">Write a Review</span></div>
                            <script type="application/ld+json">
                                {
                                    "@context": "https://schema.org/",
                                    "@type": "AggregateRating",
                                    "ratingValue": 4.9,
                                    "ratingCount": 18,
                                    "bestRating": 5,
                                    "itemReviewed": { "@type": "LocalBusiness", "name": "Calibri Real Estate Agency", "image": "https://upa.list.am/5574.jpg" }
                                }
                            </script>
                        </div>
                    </div>
                </div>
                <div class="r">
                    <div class="h">
                        <div class="addr" onclick="dlgo('Ավետիք Իսահակյանի փողոց 8, Երևան', '/?w=11&amp;u=2139261', 900);return false;" original-title="Show the map"><span>Ավետիք Իսահակյանի փողոց 8, Երևան</span></div>
                        <div class="hrs" onclick="dlgo('Business Hours', '/?w=55&amp;u=2139261', 420);return false;" original-title="Business Hours"><span>Monday - Friday 10:00 - 21:00, Saturday 10:00 - 19:00</span></div>
                    </div>
                    <div class="bp">
                        <a href="#" class="bblink" onclick="dlgo('Send a Message','/?w=8&amp;i=0&amp;u=2139261',500);return false;">Write</a>
                        <a href="#" class="bblink" onclick="dlgo('Call','/?w=12&amp;&amp;u=2139261',500);return false;">Call</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="about">
            Կալիբրի անշարժ գույքի գործակալությունը հիմնադրվել է 2021թ․ որպեսզի իր ուրույն խոսքն ու ոճը թելադրի անշարժ գույքի շուկայում։ Մենք նպատակ ունենք կոտրել հնացած և մաշված կարծրատիպերը ոլորտի մասնակիցների հանդեպ, դարձնել Հայաստանի
            անշարժ գույքի շուկան ավելի գրավիչ, զարգացած և ինովատիվ։ Եվ որ ամենակարևորն է, մատուցել իսկապես որակյալ, բարձրակարգ ծառայություններ՝ ցուցաբերելով հաճախորդամետ մոտեցումներ։<br />
            <br />
            Մեր առաքելությունն է՝ օգնել մարդկանց և կազմակերպություններին լուծել իրենց խնդիրները կապված անշարժ գույքի հետ՝ մեր կողմից առաջարկվող համալիր ծառայությունների միջոցով, թևթևացնել նրանց հոգսերը և լինել վստահելի գործընկեր։ Ակտիվացնել
            ՀՀ-ում ներդրումները անշարժ գույքի շուկայում, այդպիսով նպաստել ենթակառուցվածքների զարգացմանը և հասարակության բարօրությանը։<br />
            <br />
            Տեսլականը՝ դառնալ Հայաստանի առաջատար կազմակերպություններից մեկը տվյալ ոլորտում` Կրթելով գրագետ, հմուտ մասնագետների բարձրացնել անշարժ գույքի մասնակիցների դերը և նշանակությունը հասարակության մեջ։
        </div>
        <div class="news">
            Կազմակերպության հիմնական արժեքներ են՝ ազնվությունը, վստահությունը, հարգանքը թիմակիցների և հաճախորդների նկատմամբ, նպատակասլացությունը, հոգատարությունը և աշխատասիրությունը։<br />
            <br />
            Առանձնակի ուշադրություն է դարձվելու հաճախորդների արագ և որակյալ սպասարկմանը։<br />
            <br />
            Բոլոր աշխատողներից պահանջվելու է պահպանել էթիկայի բարձր նորմեր, որոնք կվերաբերվեն ինչպես հագուստին և արտաքին տեսքին, այնպես էլ գործընկերների և հաճախորդների հետ հարաբերություններին։<br />
            <br />
            Աշխատակիցների մասնագիտական զարգացման նպատակով պարբերաբար կկազմակերպվեն վերապատրաստումներ և դասընթացներ։
        </div>
    </div>
    <div id="pagecol">
        
        <div id="contentr">
            <div class="dl p">
                <div class="dlsearch">
                    <form name="dlf" class="filter" action="/user/2139261" method="GET">
                        <div class="txt">
                            <input type="text" name="q" value="" placeholder="Search the ads" />
                            <div class="ctrl"><input type="submit" tabindex="-1" value="" /></div>
                        </div>
                        <a href="#" class="filterbtn" onclick="return filter.toggle()">
                            <span></span>
                            <div>Filters</div>
                        </a>
                        <input type="hidden" name="_t" value="" />
                    </form>
                </div>
                <div class="gl">
                    <a href="/en/item/19126760">
                        <img data-original="//s.list.am/g/396/69317396.webp" original-title="" src="//s.list.am/g/396/69317396.webp" style="" />
                        <div class="p">$250</div>
                        <div class="l">Plot for residential development, Միքայել Նալբանդյանի փողոց in Armavir, 2000 sq.m.</div>
                        <div class="at">Armavir, 2000 sq.m.</div>
                    </a>
                    <a href="/en/item/18728182">
                        <img data-original="//s.list.am/g/304/67054304.webp" original-title="" src="//s.list.am/g/304/67054304.webp" style="" />
                        <div class="p">$130,000</div>
                        <div class="l">1 room apartment, Saryan Street, 45 sq.m., high ceilings, 1/9 floor, euro renovation</div>
                        <div class="at">Kentron, 1 rm., 45 sq.m., 1/9 floor</div>
                    </a>
                    <a href="/en/item/19057578">
                        <img data-original="//s.list.am/g/773/68916773.webp" original-title="" src="//s.list.am/g/773/68916773.webp" style="" />
                        <div class="p">$600,000</div>
                        <div class="l">Plot for residential development, Մյասնիկյան պողոտա in the center, 341 sq.m.</div>
                        <div class="at">Kentron, 341 sq.m.</div>
                    </a>
                    <a href="/en/item/19057762">
                        <img data-original="//s.list.am/g/715/68917715.webp" original-title="" src="//s.list.am/g/715/68917715.webp" style="" />
                        <div class="l l3">Industrial and Manufacturing on Nalbandyan street in Armavir, 4478 sq.m.</div>
                        <div class="at">Armavir, Panels, 4478 sq.m.</div>
                    </a>
                    <a href="/en/item/18596706">
                        <img data-original="//s.list.am/g/703/66326703.webp" original-title="" src="//s.list.am/g/703/66326703.webp" style="" />
                        <div class="p">$1,500 monthly</div>
                        <div class="l">2 room apartment in a new building on Yeznik Koghbatsi street, 45 sq.m., high ceilings, 13/18 floor</div>
                        <div class="at">Kentron, 2 rm., 45 sq.m., 13/18 floor</div>
                    </a>
                    <a href="/en/item/18649330">
                        <img data-original="//s.list.am/g/945/66613945.webp" original-title="" src="//s.list.am/g/945/66613945.webp" style="" />
                        <div class="p">250,000 ֏ monthly</div>
                        <div class="l">2 room apartment, Vardanants Street, 75 sq.m., 2 bathrooms, 6/10 floor, cosmetic renovation</div>
                        <div class="at">Kentron, 2 rm., 75 sq.m., 6/10 floor</div>
                    </a>
                    <a href="/en/item/18983206">
                        <img data-original="//s.list.am/g/801/68475801.webp" original-title="" src="//s.list.am/g/801/68475801.webp" style="" />
                        <div class="p">$750 monthly</div>
                        <div class="l">Single story stone house on Noragyugh street in the center, 90 sq.m., major renovation</div>
                        <div class="at">Kentron, 3 rm., 90 sq.m.</div>
                    </a>
                    <a href="/en/item/18751314">
                        <img data-original="//s.list.am/g/291/67181291.webp" original-title="" src="//s.list.am/g/291/67181291.webp" style="" />
                        <div class="p">$1,900 monthly</div>
                        <div class="l">3 room apartment in a new building, Sayat Nova avenue, 74 sq.m., high ceilings, 3/5 floor</div>
                        <div class="at">Kentron, 3 rm., 74 sq.m., 3/5 floor</div>
                    </a>
                    <a href="/en/item/18278787">
                        <img data-original="//s.list.am/g/413/64568413.webp" original-title="" src="//s.list.am/g/413/64568413.webp" style="" />
                        <div class="p">$120,000</div>
                        <div class="l">3 room apartment on Simon Vratsyan street, 100 sq.m., 1/14 floor, major renovation</div>
                        <div class="at">Kentron, 3 rm., 100 sq.m., 1/14 floor</div>
                    </a>
                    <a href="/en/item/18061735">
                        <img data-original="//s.list.am/g/503/63382503.webp" original-title="" src="//s.list.am/g/503/63382503.webp" style="" />
                        <div class="p">$5,000</div>
                        <div class="l">Multifunctional Space on Kievyan street in Arabkir, 300 sq.m.</div>
                        <div class="at">Arabkir, 300 sq.m.</div>
                    </a>
                    <a href="/en/item/18679894">
                        <img data-original="//s.list.am/g/226/66788226.webp" original-title="" src="//s.list.am/g/226/66788226.webp" style="" />
                        <div class="p">$2,000 monthly</div>
                        <div class="lbls"><span class="lbl lbl1">Urgent!</span></div>
                        <div class="l">4 room apartment in a new building, Amiryan Street, 160 sq.m., 2 bathrooms, high ceilings</div>
                        <div class="at">Kentron, 4 rm., 160 sq.m., 9/12 floor</div>
                    </a>
                    <a href="/en/item/18190054">
                        <img data-original="//s.list.am/g/145/64077145.webp" original-title="" src="//s.list.am/g/145/64077145.webp" style="" />
                        <div class="p">$205,000</div>
                        <div class="l">4 room apartment, Komitas Avenue, 110 sq.m., 2 bathrooms, high ceilings, second to last floor</div>
                        <div class="at">Arabkir, 4 rm., 110 sq.m., 4/5 floor</div>
                    </a>
                    <a href="/en/item/19016473">
                        <img data-original="//s.list.am/g/077/68672077.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$2,500 monthly</div>
                        <div class="l">Three story stone house, Աշտարակի խճուղի in Davitashen, 330 sq.m., 2 bathrooms, major renovation</div>
                        <div class="at">Davitashen, 5 rm., 330 sq.m.</div>
                    </a>
                    <a href="/en/item/18817024">
                        <img data-original="//s.list.am/g/652/67539652.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">450,000 ֏ monthly</div>
                        <div class="l">2 room apartment in a new building on Tigran Petrosyan street, 60 sq.m., high ceilings, 3/5 floor</div>
                        <div class="at">Davitashen, 2 rm., 60 sq.m., 3/5 floor</div>
                    </a>
                    <a href="/en/item/19031929">
                        <img data-original="//s.list.am/g/265/68763265.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$1,500 monthly</div>
                        <div class="l">2 room apartment in a new building, Aram Street, 58 sq.m., high ceilings, 5/14 floor</div>
                        <div class="at">Kentron, 2 rm., 58 sq.m., 5/14 floor</div>
                    </a>
                    <a href="/en/item/18832215">
                        <img data-original="//s.list.am/g/691/67624691.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$5,000</div>
                        <div class="l">Multifunctional Space in Erebuni, 450 sq.m.</div>
                        <div class="at">Erebuni, 450 sq.m.</div>
                    </a>
                    <a href="/en/item/18198793">
                        <img data-original="//s.list.am/g/412/64125412.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="l l3">4 room apartment in a new building, Pavstos Buzand Street, 145 sq.m., 3+ bathrooms, high ceilings</div>
                        <div class="at">Kentron, 4 rm., 145 sq.m., 10/13 floor</div>
                    </a>
                    <a href="/en/item/17419109">
                        <img data-original="//s.list.am/g/588/59991588.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$93,000</div>
                        <div class="l">2 room apartment, Մովսես Խորենացու փողոց, 73 sq.m., 10/16 floor</div>
                        <div class="at">Kentron, 2 rm., 73 sq.m., 10/16 floor</div>
                    </a>
                    <a href="/en/item/17385895">
                        <img data-original="//s.list.am/g/146/59806146.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$1,300,000</div>
                        <div class="l">Building on Araratyan street in Shengavit, 3300 sq.m.</div>
                        <div class="at">Shengavit, Monolith, 3300 sq.m.</div>
                    </a>
                    <a href="/en/item/18679792">
                        <img data-original="//s.list.am/g/538/66787538.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$9,500,000</div>
                        <div class="l">Multifunctional Space, Պարոնյանի փողոց in the center, 2330 sq.m.</div>
                        <div class="at">Kentron, Monolith, 2330 sq.m.</div>
                    </a>
                    <a href="/en/item/18679716">
                        <img data-original="//s.list.am/g/032/66787032.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$5,580,000</div>
                        <div class="l">Multifunctional Space, Պարոնյանի փողոց in the center, 1593 sq.m.</div>
                        <div class="at">Kentron, Monolith, 1593 sq.m.</div>
                    </a>
                    <a href="/en/item/17824186">
                        <img data-original="//s.list.am/g/016/65381016.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$150,000</div>
                        <div class="l">Two story stone house, Garegin Nzhdeh Street in Kasagh, 160 sq.m., 2 bathrooms, partial renovation</div>
                        <div class="at">Kasagh, 4 rm., 160 sq.m.</div>
                    </a>
                    <a href="/en/item/18591139">
                        <img data-original="//s.list.am/g/304/66295304.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">400,000 ֏ monthly</div>
                        <div class="l">2 room apartment on Hanrapetutyun street, 45 sq.m., cosmetic renovation</div>
                        <div class="at">Kentron, 2 rm., 45 sq.m., 9/9 floor</div>
                    </a>
                    <a href="/en/item/18606233">
                        <img data-original="//s.list.am/g/250/66381250.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$8,000 monthly</div>
                        <div class="l">Spacious 8 room apartment in a new building on Dzorapi street, 900 sq.m., 3+ bathrooms</div>
                        <div class="at">Kentron, 8 rm., 900 sq.m., 17/17 floor</div>
                    </a>
                    <a href="/en/item/18998161">
                        <img data-original="//s.list.am/g/155/68563155.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$120,000</div>
                        <div class="l">2 room apartment in a new building, Tsarav Aghbyuri Street, 62 sq.m., high ceilings, 9/14 floor</div>
                        <div class="at">Avan, 2 rm., 62 sq.m., 9/14 floor</div>
                    </a>
                    <a href="/en/item/17779125">
                        <img data-original="//s.list.am/g/074/61884074.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">1,000,000 ֏ monthly</div>
                        <div class="l">6 room apartment in a new building on Mher Mkrtchyan street, 198 sq.m., 2 bathrooms, high ceilings</div>
                        <div class="at">Kentron, 6 rm., 198 sq.m., 7/10 floor</div>
                    </a>
                    <a href="/en/item/17343094">
                        <img data-original="//s.list.am/g/259/59581259.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$200,000</div>
                        <div class="l">Two story house on Zakaria Sarkavag street in Kanaker-Zeytun, 270 sq.m., 3+ bathrooms</div>
                        <div class="at">Kanaker-Zeytun, 5 rm., 270 sq.m.</div>
                    </a>
                    <a href="/en/item/18145074">
                        <img data-original="//s.list.am/g/904/63832904.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$235,000</div>
                        <div class="l">Multifunctional Space on Hanrapetutyun street in the center, 284 sq.m.</div>
                        <div class="at">Kentron, Stone, 284 sq.m.</div>
                    </a>
                    <a href="/en/item/18148645">
                        <img data-original="//s.list.am/g/629/63850629.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$1,600,000</div>
                        <div class="l">Office Space, Northern Avenue in the center, 254 sq.m.</div>
                        <div class="at">Kentron, Stone, 254 sq.m.</div>
                    </a>
                    <a href="/en/item/18053022">
                        <img data-original="//s.list.am/g/391/63335391.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$1,050,000</div>
                        <div class="l">Multifunctional Space, Marshal Baghramyan avenue in Arabkir, 298 sq.m.</div>
                        <div class="at">Arabkir, Stone, 298 sq.m.</div>
                    </a>
                    <a href="/en/item/18466711">
                        <img data-original="//s.list.am/g/375/65604375.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="l l3">Multifunctional Space, Mesrop Mashtots Avenue in the center, 14 sq.m.</div>
                        <div class="at">Kentron, 14 sq.m.</div>
                    </a>
                    <a href="/en/item/18261696">
                        <img data-original="//s.list.am/g/282/64883282.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="l l3">Multifunctional Space, Աղբյուր Սերոբի փողոց in Ararat, 797 sq.m.</div>
                        <div class="at">Ararat, Stone, 797 sq.m.</div>
                    </a>
                    <a href="/en/item/18157663">
                        <img data-original="//s.list.am/g/111/63919111.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$129,000</div>
                        <div class="l">2 room apartment on Alek Manoukyan street, 68 sq.m., 2 bathrooms, high ceilings, cosmetic renovation</div>
                        <div class="at">Kentron, 2 rm., 68 sq.m., 6/6 floor</div>
                    </a>
                    <a href="/en/item/18219211">
                        <img data-original="//s.list.am/g/144/64236144.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$190,000</div>
                        <div class="l">4 room apartment in a new building on Bagrevand 45 street, 97 sq.m., 2 bathrooms, high ceilings</div>
                        <div class="at">Nor Nork, 4 rm., 97 sq.m., 1/3 floor</div>
                    </a>
                    <a href="/en/item/17353648">
                        <img data-original="//s.list.am/g/136/59649136.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$139,000</div>
                        <div class="l">3 room apartment, Կիլիկիա թաղամաս, 83 sq.m., high ceilings, 2/4 floor, major renovation</div>
                        <div class="at">Kentron, 3 rm., 83 sq.m., 2/4 floor</div>
                    </a>
                    <a href="/en/item/18193388">
                        <img data-original="//s.list.am/g/352/64095352.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">105,000,000 ֏</div>
                        <div class="l">2 room apartment in a new building, Marshal Baghramyan avenue, 87 sq.m., high ceilings, 10/22 floor</div>
                        <div class="at">Kentron, 2 rm., 87 sq.m., 10/22 floor</div>
                    </a>
                    <a href="/en/item/18871389">
                        <img data-original="//s.list.am/g/094/67845094.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$6,000 monthly</div>
                        <div class="l">4 room apartment in a new building, Վահան Տերյան փողոց, 200 sq.m., 3+ bathrooms, high ceilings</div>
                        <div class="at">Kentron, 4 rm., 200 sq.m., 7/12 floor</div>
                    </a>
                    <a href="/en/item/18437172">
                        <img data-original="//s.list.am/g/403/65439403.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="l l3">Two story stone house, Թամազյան փողոց in Ashtarak, 570 sq.m., 2 bathrooms, major renovation</div>
                        <div class="at">Ashtarak, 7 rm., 570 sq.m.</div>
                    </a>
                    <a href="/en/item/18764308">
                        <img data-original="//s.list.am/g/806/67253806.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="l l3">Two story stone house, Թամազյան փողոց in Ashtarak, 570 sq.m., 2 bathrooms, major renovation</div>
                        <div class="at">Ashtarak, 7 rm., 570 sq.m.</div>
                    </a>
                    <a href="/en/item/18411905">
                        <img data-original="//s.list.am/g/720/65295720.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$2,000 monthly</div>
                        <div class="l">Three story stone house, Ashtarak highway in Ashtarak, 280 sq.m., 3+ bathrooms, major renovation</div>
                        <div class="at">Ashtarak, 6 rm., 280 sq.m.</div>
                    </a>
                    <a href="/en/item/18871876">
                        <img data-original="//s.list.am/g/380/67848380.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$1,000 monthly</div>
                        <div class="l">Single story stone house, Ler Kamsari Street in the center, 70 sq.m., cosmetic renovation</div>
                        <div class="at">Kentron, 2 rm., 70 sq.m.</div>
                    </a>
                    <a href="/en/item/18597087">
                        <img data-original="//s.list.am/g/890/66328890.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">500,000 ֏ monthly</div>
                        <div class="l">Single story stone house, 1-ին փողոց in Byurakan, 140 sq.m., 3+ bathrooms, major renovation</div>
                        <div class="at">Byurakan, 5 rm., 140 sq.m.</div>
                    </a>
                    <a href="/en/item/18541431">
                        <img data-original="//s.list.am/g/939/66016939.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">390,000 ֏ monthly</div>
                        <div class="l">3 room apartment, Hakob Hakobyan Street, 85 sq.m., 2 bathrooms, 9/14 floor, euro renovation</div>
                        <div class="at">Arabkir, 3 rm., 85 sq.m., 9/14 floor</div>
                    </a>
                    <a href="/en/item/17970935">
                        <img data-original="//s.list.am/g/421/62891421.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$1,900 monthly</div>
                        <div class="l">4 room apartment on Tumanyan street, 110 sq.m., 2 bathrooms, high ceilings, major renovation</div>
                        <div class="at">Kentron, 4 rm., 110 sq.m., 4/4 floor</div>
                    </a>
                    <a href="/en/item/18256632">
                        <img data-original="//s.list.am/g/107/64446107.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$480,000</div>
                        <div class="l">8 room apartment, Sayat Nova avenue, 315 sq.m., 3+ bathrooms, multiple balconies, major renovation</div>
                        <div class="at">Kentron, 8 rm., 315 sq.m., 10/10 floor</div>
                    </a>
                    <a href="/en/item/17733798">
                        <img data-original="//s.list.am/g/399/61652399.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$250,000</div>
                        <div class="l">3 room apartment in a new building on Aygedzor street, 108 sq.m., 2 bathrooms, high ceilings</div>
                        <div class="at">Arabkir, 3 rm., 108 sq.m., 2/3 floor</div>
                    </a>
                    <a href="/en/item/18948398">
                        <img data-original="//s.list.am/g/633/68278633.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">250,000 ֏</div>
                        <div class="l">Office Space on Koryun street in the center, 400 sq.m.</div>
                        <div class="at">Kentron, 400 sq.m.</div>
                    </a>
                    <a href="/en/item/19061717">
                        <img data-original="//s.list.am/g/221/68940221.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$1,000 monthly</div>
                        <div class="l">3 room apartment, Վաղարշ Վաղարշյան փողոց, 78 sq.m., multiple balconies, major renovation</div>
                        <div class="at">Arabkir, 3 rm., 78 sq.m., 9/9 floor</div>
                    </a>
                    <a href="/en/item/17423577">
                        <img data-original="//s.list.am/g/938/60006938.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$185,000</div>
                        <div class="l">3 room apartment, Pushkin Street, 90 sq.m., second to last floor</div>
                        <div class="at">Kentron, 3 rm., 90 sq.m., 8/9 floor</div>
                    </a>
                    <a href="/en/item/17422361">
                        <img data-original="//s.list.am/g/874/59999874.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$148,000</div>
                        <div class="l">2 room apartment on Kajaznuni street, 70 sq.m., 3/10 floor, major renovation</div>
                        <div class="at">Kentron, 2 rm., 70 sq.m., 3/10 floor</div>
                    </a>
                    <a href="/en/item/18358635">
                        <img data-original="//s.list.am/g/622/65007622.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$12,000 monthly</div>
                        <div class="l">Four story stone house on Moldovakan street in Nor Nork, 2500 sq.m., 3+ bathrooms, large lot</div>
                        <div class="at">Nor Nork, 8 rm., 2500 sq.m.</div>
                    </a>
                    <a href="/en/item/17381248">
                        <img data-original="//s.list.am/g/258/59780258.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="l l3">Three story stone house on Varshavyan street in Kanaker-Zeytun, 360 sq.m., 3+ bathrooms</div>
                        <div class="at">Kanaker-Zeytun, 8 rm., 360 sq.m.</div>
                    </a>
                    <a href="/en/item/18560950">
                        <img data-original="//s.list.am/g/929/66125929.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$2,500 monthly</div>
                        <div class="lbls"><span class="lbl lbl1">Urgent!</span></div>
                        <div class="l">3 room apartment on Tumanyan street, 150 sq.m., 2 bathrooms, high ceilings, second to last floor</div>
                        <div class="at">Kentron, 3 rm., 150 sq.m., 3/4 floor</div>
                    </a>
                    <a href="/en/item/18307967">
                        <img data-original="//s.list.am/g/900/64733900.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">900,000 ֏</div>
                        <div class="l">Office Space, Կարապետ Ուլնեցու փողոց in Kanaker-Zeytun, 230 sq.m.</div>
                        <div class="at">Kanaker-Zeytun, 230 sq.m.</div>
                    </a>
                    <a href="/en/item/17417337">
                        <img data-original="//s.list.am/g/374/59973374.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$145,000</div>
                        <div class="l">1 room apartment on Nalbandyan street, 38 sq.m., high ceilings, 2/4 floor, euro renovation</div>
                        <div class="at">Kentron, 1 rm., 38 sq.m., 2/4 floor</div>
                    </a>
                    <a href="/en/item/17508760">
                        <img data-original="//s.list.am/g/909/60454909.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$1,500 monthly</div>
                        <div class="l">Three story townhouse, Պահլավունյաց փողոց in Tsakhkadzor, 140 sq.m., designer renovation</div>
                        <div class="at">Tsakhkadzor, 3 rm., 140 sq.m.</div>
                    </a>
                    <a href="/en/item/18596259">
                        <img data-original="//s.list.am/g/479/66323479.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">300,000 ֏ monthly</div>
                        <div class="l">Single story stone house, 1-ին փողոցի in Byurakan, 63 sq.m., 2 bathrooms, cosmetic renovation</div>
                        <div class="at">Byurakan, 3 rm., 63 sq.m.</div>
                    </a>
                    <a href="/en/item/18745956">
                        <img data-original="//s.list.am/g/715/67150715.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$149,500</div>
                        <div class="l">Spacious 1 room apartment on Mamikonyants street, 76 sq.m., 9/11 floor, major renovation</div>
                        <div class="at">Arabkir, 1 rm., 76 sq.m., 9/11 floor</div>
                    </a>
                    <a href="/en/item/18260852">
                        <img data-original="//s.list.am/g/309/64587309.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="l l3">Two story stone house on Vahagni street in Ajapnyak, 650 sq.m., 3+ bathrooms, major renovation</div>
                        <div class="at">Ajapnyak, 6 rm., 650 sq.m.</div>
                    </a>
                    <a href="/en/item/18648905">
                        <img data-original="//s.list.am/g/006/66611006.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$4,500 monthly</div>
                        <div class="l">Three story stone house on Aygedzor street in the center, 250 sq.m., 3+ bathrooms, major renovation</div>
                        <div class="at">Kentron, 5 rm., 250 sq.m.</div>
                    </a>
                    <a href="/en/item/18746039">
                        <img data-original="//s.list.am/g/335/67151335.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$302,000</div>
                        <div class="l">3 room apartment in a new building, Արաբկիրի, 131 sq.m., 2 bathrooms, high ceilings, 5/8 floor</div>
                        <div class="at">Arabkir, 3 rm., 131 sq.m., 5/8 floor</div>
                    </a>
                    <a href="/en/item/17883747">
                        <img data-original="//s.list.am/g/982/62426982.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$3,500 monthly</div>
                        <div class="l">Three story stone house on Varshavyan street in Kanaker-Zeytun, 360 sq.m., 3+ bathrooms</div>
                        <div class="at">Kanaker-Zeytun, 8 rm., 360 sq.m.</div>
                    </a>
                    <a href="/en/item/18113279">
                        <img data-original="//s.list.am/g/008/63661008.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$1,800 monthly</div>
                        <div class="l">Two story stone house on Dzagavank street in Arinj, 220 sq.m., 2 bathrooms, major renovation</div>
                        <div class="at">Arinj, 5 rm., 220 sq.m.</div>
                    </a>
                    <a href="/en/item/18659887">
                        <img data-original="//s.list.am/g/423/66695423.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$2,200 monthly</div>
                        <div class="l">Two story stone house on Zovuni 16 street in Zovuni, 350 sq.m., 3+ bathrooms, large lot</div>
                        <div class="at">Zovuni, 6 rm., 350 sq.m.</div>
                    </a>
                    <a href="/en/item/18746180">
                        <img data-original="//s.list.am/g/531/67556531.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$178,000</div>
                        <div class="l">2 room apartment in a new building on Verin Antarayin street, 61 sq.m., high ceilings, 4/6 floor</div>
                        <div class="at">Kentron, 2 rm., 61 sq.m., 4/6 floor</div>
                    </a>
                    <a href="/en/item/18318098">
                        <img data-original="//s.list.am/g/584/64785584.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">450,000 ֏ monthly</div>
                        <div class="l">Two story stone house, Եղիազարյան փողոց in Ajapnyak, 240 sq.m., 2 bathrooms, major renovation</div>
                        <div class="at">Ajapnyak, 5 rm., 240 sq.m.</div>
                    </a>
                    <a href="/en/item/18198800">
                        <img data-original="//s.list.am/g/478/64125478.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$12,000</div>
                        <div class="l">Multifunctional Space on Moskovyan street in the center, 352 sq.m.</div>
                        <div class="at">Kentron, 352 sq.m.</div>
                    </a>
                    <a href="/en/item/17991723">
                        <img data-original="//s.list.am/g/179/63001179.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$2,000 monthly</div>
                        <div class="l">Three story stone house on Verin Antarayin street in the center, 300 sq.m., 3+ bathrooms</div>
                        <div class="at">Kentron, 5 rm., 300 sq.m.</div>
                    </a>
                    <a href="/en/item/17595083">
                        <img data-original="//s.list.am/g/516/60914516.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$2,500 monthly</div>
                        <div class="l">Three story house, Նոյ թաղամաս in Malatia-Sebastia, 360 sq.m., 3+ bathrooms, major renovation</div>
                        <div class="at">Malatia-Sebastia, 4 rm., 360 sq.m.</div>
                    </a>
                    <a href="/en/item/17324791">
                        <img data-original="//s.list.am/g/729/59487729.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$5,000 monthly</div>
                        <div class="l">Three story house, Karapet Ulnetsi Street in Kanaker-Zeytun, 650 sq.m., 3+ bathrooms</div>
                        <div class="at">Kanaker-Zeytun, 8 rm., 650 sq.m.</div>
                    </a>
                    <a href="/en/item/18777091">
                        <img data-original="//s.list.am/g/411/67324411.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">1,000,000 ֏</div>
                        <div class="l">Multifunctional Space, Argishti Street in the center, 111 sq.m.</div>
                        <div class="at">Kentron, 111 sq.m.</div>
                    </a>
                    <a href="/en/item/18409880">
                        <img data-original="//s.list.am/g/455/65283455.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">1,500,000 ֏</div>
                        <div class="l">Office Space, Republic Square in the center, 140 sq.m.</div>
                        <div class="at">Kentron, 140 sq.m.</div>
                    </a>
                    <a href="/en/item/17433300">
                        <img data-original="//s.list.am/g/384/60058384.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$280,000</div>
                        <div class="l">3 room apartment, Mesrop Mashtots Avenue, 103 sq.m., 2 bathrooms, 9/12 floor, major renovation</div>
                        <div class="at">Kentron, 3 rm., 103 sq.m., 9/12 floor</div>
                    </a>
                    <a href="/en/item/18744540">
                        <img data-original="//s.list.am/g/755/67142755.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$225,000</div>
                        <div class="l">3 room apartment in a new building on Nikoghayos Adonts street, 83 sq.m., 2 bathrooms, high ceilings</div>
                        <div class="at">Arabkir, 3 rm., 83 sq.m., 3/9 floor</div>
                    </a>
                    <a href="/en/item/18273106">
                        <img data-original="//s.list.am/g/736/64536736.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$6,000</div>
                        <div class="l">Office Space on Derenik Demirchyan street in the center, 245 sq.m.</div>
                        <div class="at">Kentron, 245 sq.m.</div>
                    </a>
                    <a href="/en/item/18006912">
                        <img data-original="//s.list.am/g/606/63085606.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$165,000</div>
                        <div class="l">Two story stone house, P. Sevak 2nd St. in Arinj, 148 sq.m., 2 bathrooms, major renovation</div>
                        <div class="at">Arinj, 4 rm., 148 sq.m.</div>
                    </a>
                    <a href="/en/item/17491044">
                        <img data-original="//s.list.am/g/496/60361496.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$350,000</div>
                        <div class="l">4 room apartment on Hanrapetutyun street, 107 sq.m., high ceilings, second to last floor</div>
                        <div class="at">Kentron, 4 rm., 107 sq.m., 3/4 floor</div>
                    </a>
                    <a href="/en/item/18146027">
                        <img data-original="//s.list.am/g/333/63837333.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">2,000,000 ֏</div>
                        <div class="l">Multifunctional Space, Marshal Baghramyan avenue in the center, 177 sq.m.</div>
                        <div class="at">Kentron, 177 sq.m.</div>
                    </a>
                    <a href="/en/item/18197467">
                        <img data-original="//s.list.am/g/692/64117692.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$90,000</div>
                        <div class="l">Spacious 1 room apartment, Այգեձորի փողոց, 73 sq.m., high ceilings, second to last floor</div>
                        <div class="at">Arabkir, 1 rm., 73 sq.m., 4/5 floor</div>
                    </a>
                    <a href="/en/item/18816653">
                        <img data-original="//s.list.am/g/545/67537545.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$1,300,000</div>
                        <div class="l">Commercial Property, Նիկողայոս Ադոնցի փողոց in Arabkir, 3400 sq.m.</div>
                        <div class="at">Arabkir, Panels, 3400 sq.m.</div>
                    </a>
                    <a href="/en/item/18846756">
                        <img data-original="//s.list.am/g/945/67704945.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">580,000 ֏ monthly</div>
                        <div class="l">2 room apartment in a new building, Argishti Street, 49 sq.m., 7/14 floor, cosmetic renovation</div>
                        <div class="at">Kentron, 2 rm., 49 sq.m., 7/14 floor</div>
                    </a>
                    <a href="/en/item/18537563">
                        <img data-original="//s.list.am/g/725/65994725.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$2,200 monthly</div>
                        <div class="l">4 room apartment in a new building, Վերին Անտառային փողոց, 178 sq.m., 2 bathrooms, high ceilings</div>
                        <div class="at">Kentron, 4 rm., 178 sq.m., 1/4 floor</div>
                    </a>
                    <a href="/en/item/18564106">
                        <img data-original="//s.list.am/g/094/66143094.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$900,000</div>
                        <div class="l">3 room apartment in a new building, Aram Street, 142 sq.m., 2 bathrooms, high ceilings, 3/13 floor</div>
                        <div class="at">Kentron, 3 rm., 142 sq.m., 3/13 floor</div>
                    </a>
                    <a href="/en/item/18244083">
                        <img data-original="//s.list.am/g/505/64374505.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">200,000 ֏</div>
                        <div class="l">3 room apartment on Marshal Khudyakov street, 67 sq.m., 2 bathrooms, 3/9 floor, cosmetic renovation</div>
                        <div class="at">Avan, 3 rm., 67 sq.m., 3/9 floor</div>
                    </a>
                    <a href="/en/item/17650591">
                        <img data-original="//s.list.am/g/928/61209928.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="l l3">Two story stone house, Միկոյան եղբայրների փողոց in Ashtarak, 185 sq.m., 2 bathrooms</div>
                        <div class="at">Ashtarak, 7 rm., 185 sq.m.</div>
                    </a>
                    <a href="/en/item/17672059">
                        <img data-original="//s.list.am/g/013/61327013.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$120,000</div>
                        <div class="l">5 room apartment in a new building, Դավթաշեն, 97 sq.m., high ceilings, 1/9 floor, euro renovation</div>
                        <div class="at">Davitashen, 5 rm., 97 sq.m., 1/9 floor</div>
                    </a>
                    <a href="/en/item/18453351">
                        <img data-original="//s.list.am/g/211/65528211.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$5,000 monthly</div>
                        <div class="l">Spacious 5 room apartment in a new building on Alek Manoukyan street, 300 sq.m., 3+ bathrooms</div>
                        <div class="at">Kentron, 5 rm., 300 sq.m., 4/6 floor</div>
                    </a>
                    <a href="/en/item/18474259">
                        <img data-original="//s.list.am/g/079/65646079.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$165,000</div>
                        <div class="l">4 room apartment, Մովսես Խորենացու փողոց, 92 sq.m., multiple balconies, 6/12 floor</div>
                        <div class="at">Kentron, 4 rm., 92 sq.m., 6/12 floor</div>
                    </a>
                    <a href="/en/item/18745046">
                        <img data-original="//s.list.am/g/329/67145329.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$99,000</div>
                        <div class="l">2 room apartment, Mesrop Mashtots Avenue, 33 sq.m., high ceilings, 1/5 floor, major renovation</div>
                        <div class="at">Kentron, 2 rm., 33 sq.m., 1/5 floor</div>
                    </a>
                    <a href="/en/item/18846755">
                        <img data-original="//s.list.am/g/926/67704926.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$132,000</div>
                        <div class="l">5 room apartment on Vratsakan street, 118 sq.m., major renovation, stone building</div>
                        <div class="at">Arabkir, 5 rm., 118 sq.m., 5/5 floor</div>
                    </a>
                    <a href="/en/item/18148481">
                        <img data-original="//s.list.am/g/605/63849605.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$520,500</div>
                        <div class="l">6 room apartment on Abovyan street, 240 sq.m., 3+ bathrooms, high ceilings, second to last floor</div>
                        <div class="at">Kentron, 6 rm., 240 sq.m., 4/5 floor</div>
                    </a>
                    <a href="/en/item/18807986">
                        <img data-original="//s.list.am/g/430/67496430.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$175,000</div>
                        <div class="lbls"><span class="lbl lbl1">Urgent!</span></div>
                        <div class="l">2 room apartment in a new building, Forest Street, 55 sq.m., high ceilings, 2/14 floor</div>
                        <div class="at">Kentron, 2 rm., 55 sq.m., 2/14 floor</div>
                    </a>
                    <a href="/en/item/18474680">
                        <img data-original="//s.list.am/g/476/65648476.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$265,000</div>
                        <div class="l">6 room apartment, Մովսես Խորենացու փողոց, 225 sq.m., 2 bathrooms, high ceilings, multiple balconies</div>
                        <div class="at">Kentron, 6 rm., 225 sq.m., 4/4 floor</div>
                    </a>
                    <a href="/en/item/18915313">
                        <img data-original="//s.list.am/g/713/68092713.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$150,000</div>
                        <div class="l">3 room apartment on Nikoghayos Adonts street, 95 sq.m., 11/15 floor, major renovation</div>
                        <div class="at">Arabkir, 3 rm., 95 sq.m., 11/15 floor</div>
                    </a>
                    <a href="/en/item/17994135">
                        <img data-original="//s.list.am/g/496/63014496.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$260,000</div>
                        <div class="l">Two story stone house, Ashtarak highway in Ushi, 380 sq.m., 2 bathrooms, large lot, euro renovation</div>
                        <div class="at">Ushi, 7 rm., 380 sq.m.</div>
                    </a>
                    <a href="/en/item/17735620">
                        <img data-original="//s.list.am/g/815/61662815.webp" original-title="" src="data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACwAAAAAAQABAAACAkQBADs=" />
                        <div class="p">$102,000</div>
                        <div class="l">2 room apartment, Tigran Mets Avenue near the Republic square, 45 sq.m., 2/5 floor</div>
                        <div class="at">Kentron, 2 rm., 45 sq.m., 2/5 floor</div>
                    </a>
                </div>
                <div class="dlf">
                    &nbsp;
                    <span class="pp">
                        <span class="c">1</span><a href="/user/2139261?pg=2">2</a><a href="/user/2139261?pg=3">3</a><a href="/user/2139261?pg=4">4</a><a href="/user/2139261?pg=5">5</a><a href="/user/2139261?pg=6">6</a>
                        <a href="/user/2139261?pg=7">7</a>
                    </span>
                    &nbsp; <a href="/user/2139261?pg=2">Next &gt;</a>
                </div>
            </div>
            <div id="star" class="gl" style="display: none;"><div class="on" original-title="Add to Favorites"></div></div>
        </div>
    </div>
</div>

@endsection
