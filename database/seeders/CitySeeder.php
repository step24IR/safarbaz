<?php

namespace Database\Seeders;

use App\Models\City;
use App\Models\Province;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    public function run(): void
    {
        Province::insert([
            ['name' => 'آذربایجان شرقی'],
            ['name' => 'آذربایجان غربی'],
            ['name' => 'اردبیل'],
            ['name' => 'اصفهان'],
            ['name' => 'البرز'],
            ['name' => 'ایلام'],
            ['name' => 'بوشهر'],
            ['name' => 'تهران'],
            ['name' => 'چهارمحال بختیاری'],
            ['name' => 'خراسان جنوبی'],
            ['name' => 'خراسان رضوی'],
            ['name' => 'خراسان شمالی'],
            ['name' => 'خوزستان'],
            ['name' => 'زنجان'],
            ['name' => 'سمنان'],
            ['name' => 'سیستان و بلوچستان'],
            ['name' => 'فارس'],
            ['name' => 'قزوین'],
            ['name' => 'قم'],
            ['name' => 'کردستان'],
            ['name' => 'کرمان'],
            ['name' => 'کرمانشاه'],
            ['name' => 'کهگیلویه و بویراحمد'],
            ['name' => 'گلستان'],
            ['name' => 'گیلان'],
            ['name' => 'لرستان'],
            ['name' => 'مازندران'],
            ['name' => 'مرکزی'],
            ['name' => 'هرمزگان'],
            ['name' => 'همدان'],
            ['name' => 'یزد']
        ]);

        City::insert([
            ['province_id' => 1, 'name' => 'تبریز'],
            ['province_id' => 1, 'name' => 'کندوان'],
            ['province_id' => 1, 'name' => 'بندر شرفخانه'],
            ['province_id' => 1, 'name' => 'مراغه'],
            ['province_id' => 1, 'name' => 'میانه'],
            ['province_id' => 1, 'name' => 'شبستر'],
            ['province_id' => 1, 'name' => 'مرند'],
            ['province_id' => 1, 'name' => 'جلفا'],
            ['province_id' => 1, 'name' => 'سراب'],
            ['province_id' => 1, 'name' => 'هادیشهر'],
            ['province_id' => 1, 'name' => 'بناب'],
            ['province_id' => 1, 'name' => 'کلیبر'],
            ['province_id' => 1, 'name' => 'تسوج'],
            ['province_id' => 1, 'name' => 'اهر'],
            ['province_id' => 1, 'name' => 'هریس'],
            ['province_id' => 1, 'name' => 'عجبشیر'],
            ['province_id' => 1, 'name' => 'هشترود'],
            ['province_id' => 1, 'name' => 'ملکان'],
            ['province_id' => 1, 'name' => 'بستان آباد'],
            ['province_id' => 1, 'name' => 'ورزقان'],
            ['province_id' => 1, 'name' => 'اسکو'],
            ['province_id' => 1, 'name' => 'آذر شهر'],
            ['province_id' => 1, 'name' => 'قره آغاج'],
            ['province_id' => 1, 'name' => 'ممقان'],
            ['province_id' => 1, 'name' => 'صوفیان'],
            ['province_id' => 1, 'name' => 'ایلخچی'],
            ['province_id' => 1, 'name' => 'خسروشهر'],
            ['province_id' => 1, 'name' => 'باسمنج'],
            ['province_id' => 1, 'name' => 'سهند'],
            ['province_id' => 2, 'name' => 'ارومیه'],
            ['province_id' => 2, 'name' => 'نقده'],
            ['province_id' => 2, 'name' => 'ماکو'],
            ['province_id' => 2, 'name' => 'تکاب'],
            ['province_id' => 2, 'name' => 'خوی'],
            ['province_id' => 2, 'name' => 'مهاباد'],
            ['province_id' => 2, 'name' => 'سر دشت'],
            ['province_id' => 2, 'name' => 'چالدران'],
            ['province_id' => 2, 'name' => 'بوکان'],
            ['province_id' => 2, 'name' => 'میاندوآب'],
            ['province_id' => 2, 'name' => 'سلماس'],
            ['province_id' => 2, 'name' => 'شاهین دژ'],
            ['province_id' => 2, 'name' => 'پیرانشهر'],
            ['province_id' => 2, 'name' => 'سیه چشمه'],
            ['province_id' => 2, 'name' => 'اشنویه'],
            ['province_id' => 2, 'name' => 'چایپاره'],
            ['province_id' => 2, 'name' => 'پلدشت'],
            ['province_id' => 2, 'name' => 'شوط'],
            ['province_id' => 3, 'name' => 'اردبیل'],
            ['province_id' => 3, 'name' => 'سرعین'],
            ['province_id' => 3, 'name' => 'بیله سوار'],
            ['province_id' => 3, 'name' => 'پارس آباد'],
            ['province_id' => 3, 'name' => 'خلخال'],
            ['province_id' => 3, 'name' => 'مشگین شهر'],
            ['province_id' => 3, 'name' => 'مغان'],
            ['province_id' => 3, 'name' => 'نمین'],
            ['province_id' => 3, 'name' => 'نیر'],
            ['province_id' => 3, 'name' => 'کوثر'],
            ['province_id' => 3, 'name' => 'کیوی'],
            ['province_id' => 3, 'name' => 'گرمی'],
            ['province_id' => 4, 'name' => 'اصفهان'],
            ['province_id' => 4, 'name' => 'فریدن'],
            ['province_id' => 4, 'name' => 'فریدون شهر'],
            ['province_id' => 4, 'name' => 'فلاورجان'],
            ['province_id' => 4, 'name' => 'گلپایگان'],
            ['province_id' => 4, 'name' => 'دهاقان'],
            ['province_id' => 4, 'name' => 'نطنز'],
            ['province_id' => 4, 'name' => 'نایین'],
            ['province_id' => 4, 'name' => 'تیران'],
            ['province_id' => 4, 'name' => 'کاشان'],
            ['province_id' => 4, 'name' => 'فولاد شهر'],
            ['province_id' => 4, 'name' => 'اردستان'],
            ['province_id' => 4, 'name' => 'سمیرم'],
            ['province_id' => 4, 'name' => 'درچه'],
            ['province_id' => 4, 'name' => 'کوهپایه'],
            ['province_id' => 4, 'name' => 'مبارکه'],
            ['province_id' => 4, 'name' => 'شهرضا'],
            ['province_id' => 4, 'name' => 'خمینی شهر'],
            ['province_id' => 4, 'name' => 'شاهین شهر'],
            ['province_id' => 4, 'name' => 'نجف آباد'],
            ['province_id' => 4, 'name' => 'دولت آباد'],
            ['province_id' => 4, 'name' => 'زرین شهر'],
            ['province_id' => 4, 'name' => 'آران و بیدگل'],
            ['province_id' => 4, 'name' => 'باغ بهادران'],
            ['province_id' => 4, 'name' => 'خوانسار'],
            ['province_id' => 4, 'name' => 'مهردشت'],
            ['province_id' => 4, 'name' => 'علویجه'],
            ['province_id' => 4, 'name' => 'عسگران'],
            ['province_id' => 4, 'name' => 'نهضت آباد'],
            ['province_id' => 4, 'name' => 'حاجی آباد'],
            ['province_id' => 4, 'name' => 'تودشک'],
            ['province_id' => 4, 'name' => 'ورزنه'],
            ['province_id' => 6, 'name' => 'ایلام'],
            ['province_id' => 6, 'name' => 'مهران'],
            ['province_id' => 6, 'name' => 'دهلران'],
            ['province_id' => 6, 'name' => 'آبدانان'],
            ['province_id' => 6, 'name' => 'شیروان چرداول'],
            ['province_id' => 6, 'name' => 'دره شهر'],
            ['province_id' => 6, 'name' => 'ایوان'],
            ['province_id' => 6, 'name' => 'سرابله'],
            ['province_id' => 7, 'name' => 'بوشهر'],
            ['province_id' => 7, 'name' => 'تنگستان'],
            ['province_id' => 7, 'name' => 'دشتستان'],
            ['province_id' => 7, 'name' => 'دیر'],
            ['province_id' => 7, 'name' => 'دیلم'],
            ['province_id' => 7, 'name' => 'کنگان'],
            ['province_id' => 7, 'name' => 'گناوه'],
            ['province_id' => 7, 'name' => 'ریشهر'],
            ['province_id' => 7, 'name' => 'دشتی'],
            ['province_id' => 7, 'name' => 'خورموج'],
            ['province_id' => 7, 'name' => 'اهرم'],
            ['province_id' => 7, 'name' => 'برازجان'],
            ['province_id' => 7, 'name' => 'خارک'],
            ['province_id' => 7, 'name' => 'جم'],
            ['province_id' => 7, 'name' => 'کاکی'],
            ['province_id' => 7, 'name' => 'عسلویه'],
            ['province_id' => 7, 'name' => 'بردخون'],
            ['province_id' => 8, 'name' => 'تهران'],
            ['province_id' => 8, 'name' => 'ورامین'],
            ['province_id' => 8, 'name' => 'فیروزکوه'],
            ['province_id' => 8, 'name' => 'ری'],
            ['province_id' => 8, 'name' => 'دماوند'],
            ['province_id' => 8, 'name' => 'اسلامشهر'],
            ['province_id' => 8, 'name' => 'رودهن'],
            ['province_id' => 8, 'name' => 'لواسان'],
            ['province_id' => 8, 'name' => 'بومهن'],
            ['province_id' => 8, 'name' => 'تجریش'],
            ['province_id' => 8, 'name' => 'فشم'],
            ['province_id' => 8, 'name' => 'کهریزک'],
            ['province_id' => 8, 'name' => 'پاکدشت'],
            ['province_id' => 8, 'name' => 'چهاردانگه'],
            ['province_id' => 8, 'name' => 'شریف آباد'],
            ['province_id' => 8, 'name' => 'قرچک'],
            ['province_id' => 8, 'name' => 'باقرشهر'],
            ['province_id' => 8, 'name' => 'شهریار'],
            ['province_id' => 8, 'name' => 'رباط کریم'],
            ['province_id' => 8, 'name' => 'قدس'],
            ['province_id' => 8, 'name' => 'ملارد'],
            ['province_id' => 9, 'name' => 'شهرکرد'],
            ['province_id' => 9, 'name' => 'فارسان'],
            ['province_id' => 9, 'name' => 'بروجن'],
            ['province_id' => 9, 'name' => 'چلگرد'],
            ['province_id' => 9, 'name' => 'اردل'],
            ['province_id' => 9, 'name' => 'لردگان'],
            ['province_id' => 9, 'name' => 'سامان'],
            ['province_id' => 10, 'name' => 'قائن'],
            ['province_id' => 10, 'name' => 'فردوس'],
            ['province_id' => 10, 'name' => 'بیرجند'],
            ['province_id' => 10, 'name' => 'نهبندان'],
            ['province_id' => 10, 'name' => 'سربیشه'],
            ['province_id' => 10, 'name' => 'طبس مسینا'],
            ['province_id' => 10, 'name' => 'قهستان'],
            ['province_id' => 10, 'name' => 'درمیان'],
            ['province_id' => 11, 'name' => 'مشهد'],
            ['province_id' => 11, 'name' => 'نیشابور'],
            ['province_id' => 11, 'name' => 'سبزوار'],
            ['province_id' => 11, 'name' => 'کاشمر'],
            ['province_id' => 11, 'name' => 'گناباد'],
            ['province_id' => 11, 'name' => 'طبس'],
            ['province_id' => 11, 'name' => 'تربت حیدریه'],
            ['province_id' => 11, 'name' => 'خواف'],
            ['province_id' => 11, 'name' => 'تربت جام'],
            ['province_id' => 11, 'name' => 'تایباد'],
            ['province_id' => 11, 'name' => 'قوچان'],
            ['province_id' => 11, 'name' => 'سرخس'],
            ['province_id' => 11, 'name' => 'بردسکن'],
            ['province_id' => 11, 'name' => 'فریمان'],
            ['province_id' => 11, 'name' => 'چناران'],
            ['province_id' => 11, 'name' => 'درگز'],
            ['province_id' => 11, 'name' => 'کلات'],
            ['province_id' => 11, 'name' => 'طرقبه'],
            ['province_id' => 11, 'name' => 'سر ولایت'],
            ['province_id' => 12, 'name' => 'بجنورد'],
            ['province_id' => 12, 'name' => 'اسفراین'],
            ['province_id' => 12, 'name' => 'جاجرم'],
            ['province_id' => 12, 'name' => 'شیروان'],
            ['province_id' => 12, 'name' => 'آشخانه'],
            ['province_id' => 12, 'name' => 'گرمه'],
            ['province_id' => 12, 'name' => 'ساروج'],
            ['province_id' => 13, 'name' => 'اهواز'],
            ['province_id' => 13, 'name' => 'ایرانشهر'],
            ['province_id' => 13, 'name' => 'شوش'],
            ['province_id' => 13, 'name' => 'آبادان'],
            ['province_id' => 13, 'name' => 'خرمشهر'],
            ['province_id' => 13, 'name' => 'مسجد سلیمان'],
            ['province_id' => 13, 'name' => 'ایذه'],
            ['province_id' => 13, 'name' => 'شوشتر'],
            ['province_id' => 13, 'name' => 'اندیمشک'],
            ['province_id' => 13, 'name' => 'سوسنگرد'],
            ['province_id' => 13, 'name' => 'هویزه'],
            ['province_id' => 13, 'name' => 'دزفول'],
            ['province_id' => 13, 'name' => 'شادگان'],
            ['province_id' => 13, 'name' => 'بندر ماهشهر'],
            ['province_id' => 13, 'name' => 'بندر امام خمینی'],
            ['province_id' => 13, 'name' => 'امیدیه'],
            ['province_id' => 13, 'name' => 'بهبهان'],
            ['province_id' => 13, 'name' => 'رامهرمز'],
            ['province_id' => 13, 'name' => 'باغ ملک'],
            ['province_id' => 13, 'name' => 'هندیجان'],
            ['province_id' => 13, 'name' => 'لالی'],
            ['province_id' => 13, 'name' => 'رامشیر'],
            ['province_id' => 13, 'name' => 'حمیدیه'],
            ['province_id' => 13, 'name' => 'دغاغله'],
            ['province_id' => 13, 'name' => 'ملاثانی'],
            ['province_id' => 13, 'name' => 'شادگان'],
            ['province_id' => 13, 'name' => 'ویسی'],
            ['province_id' => 14, 'name' => 'زنجان'],
            ['province_id' => 14, 'name' => 'ابهر'],
            ['province_id' => 14, 'name' => 'خدابنده'],
            ['province_id' => 14, 'name' => 'طارم'],
            ['province_id' => 14, 'name' => 'ماهنشان'],
            ['province_id' => 14, 'name' => 'خرمدره'],
            ['province_id' => 14, 'name' => 'ایجرود'],
            ['province_id' => 14, 'name' => 'زرین آباد'],
            ['province_id' => 14, 'name' => 'آب بر'],
            ['province_id' => 14, 'name' => 'قیدار'],
            ['province_id' => 15, 'name' => 'سمنان'],
            ['province_id' => 15, 'name' => 'شاهرود'],
            ['province_id' => 15, 'name' => 'گرمسار'],
            ['province_id' => 15, 'name' => 'ایوانکی'],
            ['province_id' => 15, 'name' => 'دامغان'],
            ['province_id' => 15, 'name' => 'بسطام'],
            ['province_id' => 16, 'name' => 'زاهدان'],
            ['province_id' => 16, 'name' => 'چابهار'],
            ['province_id' => 16, 'name' => 'خاش'],
            ['province_id' => 16, 'name' => 'سراوان'],
            ['province_id' => 16, 'name' => 'زابل'],
            ['province_id' => 16, 'name' => 'سرباز'],
            ['province_id' => 16, 'name' => 'نیکشهر'],
            ['province_id' => 16, 'name' => 'ایرانشهر'],
            ['province_id' => 16, 'name' => 'راسک'],
            ['province_id' => 16, 'name' => 'میرجاوه'],
            ['province_id' => 17, 'name' => 'شیراز'],
            ['province_id' => 17, 'name' => 'اقلید'],
            ['province_id' => 17, 'name' => 'داراب'],
            ['province_id' => 17, 'name' => 'فسا'],
            ['province_id' => 17, 'name' => 'مرودشت'],
            ['province_id' => 17, 'name' => 'خرم بید'],
            ['province_id' => 17, 'name' => 'آباده'],
            ['province_id' => 17, 'name' => 'کازرون'],
            ['province_id' => 17, 'name' => 'ممسنی'],
            ['province_id' => 17, 'name' => 'سپیدان'],
            ['province_id' => 17, 'name' => 'لار'],
            ['province_id' => 17, 'name' => 'فیروز آباد'],
            ['province_id' => 17, 'name' => 'جهرم'],
            ['province_id' => 17, 'name' => 'نی ریز'],
            ['province_id' => 17, 'name' => 'استهبان'],
            ['province_id' => 17, 'name' => 'لامرد'],
            ['province_id' => 17, 'name' => 'مهر'],
            ['province_id' => 17, 'name' => 'حاجی آباد'],
            ['province_id' => 17, 'name' => 'نورآباد'],
            ['province_id' => 17, 'name' => 'اردکان'],
            ['province_id' => 17, 'name' => 'صفاشهر'],
            ['province_id' => 17, 'name' => 'ارسنجان'],
            ['province_id' => 17, 'name' => 'قیروکارزین'],
            ['province_id' => 17, 'name' => 'سوریان'],
            ['province_id' => 17, 'name' => 'فراشبند'],
            ['province_id' => 17, 'name' => 'سروستان'],
            ['province_id' => 17, 'name' => 'ارژن'],
            ['province_id' => 17, 'name' => 'گویم'],
            ['province_id' => 17, 'name' => 'داریون'],
            ['province_id' => 17, 'name' => 'زرقان'],
            ['province_id' => 17, 'name' => 'خان زنیان'],
            ['province_id' => 17, 'name' => 'کوار'],
            ['province_id' => 17, 'name' => 'ده بید'],
            ['province_id' => 17, 'name' => 'باب انار/خفر'],
            ['province_id' => 17, 'name' => 'بوانات'],
            ['province_id' => 17, 'name' => 'خرامه'],
            ['province_id' => 17, 'name' => 'خنج'],
            ['province_id' => 17, 'name' => 'سیاخ دارنگون'],
            ['province_id' => 18, 'name' => 'قزوین'],
            ['province_id' => 18, 'name' => 'تاکستان'],
            ['province_id' => 18, 'name' => 'آبیک'],
            ['province_id' => 18, 'name' => 'بوئینزهرا'],
            ['province_id' => 19, 'name' => 'قم'],
            ['province_id' => 5, 'name' => 'طالقان'],
            ['province_id' => 5, 'name' => 'نظرآباد'],
            ['province_id' => 5, 'name' => 'اشتهارد'],
            ['province_id' => 5, 'name' => 'هشتگرد'],
            ['province_id' => 5, 'name' => 'کن'],
            ['province_id' => 5, 'name' => 'آسارا'],
            ['province_id' => 5, 'name' => 'شهرک گلستان'],
            ['province_id' => 5, 'name' => 'اندیشه'],
            ['province_id' => 5, 'name' => 'کرج'],
            ['province_id' => 5, 'name' => 'نظر آباد'],
            ['province_id' => 5, 'name' => 'گوهردشت'],
            ['province_id' => 5, 'name' => 'ماهدشت'],
            ['province_id' => 5, 'name' => 'مشکین دشت'],
            ['province_id' => 20, 'name' => 'سنندج'],
            ['province_id' => 20, 'name' => 'دیواندره'],
            ['province_id' => 20, 'name' => 'بانه'],
            ['province_id' => 20, 'name' => 'بیجار'],
            ['province_id' => 20, 'name' => 'سقز'],
            ['province_id' => 20, 'name' => 'کامیاران'],
            ['province_id' => 20, 'name' => 'قروه'],
            ['province_id' => 20, 'name' => 'مریوان'],
            ['province_id' => 20, 'name' => 'صلوات آباد'],
            ['province_id' => 20, 'name' => 'حسن آباد'],
            ['province_id' => 21, 'name' => 'کرمان'],
            ['province_id' => 21, 'name' => 'راور'],
            ['province_id' => 21, 'name' => 'بابک'],
            ['province_id' => 21, 'name' => 'انار'],
            ['province_id' => 21, 'name' => 'کوهبنان'],
            ['province_id' => 21, 'name' => 'رفسنجان'],
            ['province_id' => 21, 'name' => 'بافت'],
            ['province_id' => 21, 'name' => 'سیرجان'],
            ['province_id' => 21, 'name' => 'کهنوج'],
            ['province_id' => 21, 'name' => 'زرند'],
            ['province_id' => 21, 'name' => 'بم'],
            ['province_id' => 21, 'name' => 'جیرفت'],
            ['province_id' => 21, 'name' => 'بردسیر'],
            ['province_id' => 22, 'name' => 'کرمانشاه'],
            ['province_id' => 22, 'name' => 'اسلام آباد غرب'],
            ['province_id' => 22, 'name' => 'سر پل ذهاب'],
            ['province_id' => 22, 'name' => 'کنگاور'],
            ['province_id' => 22, 'name' => 'سنقر'],
            ['province_id' => 22, 'name' => 'قصر شیرین'],
            ['province_id' => 22, 'name' => 'گیلان غرب'],
            ['province_id' => 22, 'name' => 'هرسین'],
            ['province_id' => 22, 'name' => 'صحنه'],
            ['province_id' => 22, 'name' => 'پاوه'],
            ['province_id' => 22, 'name' => 'جوانرود'],
            ['province_id' => 22, 'name' => 'شاهو'],
            ['province_id' => 23, 'name' => 'یاسوج'],
            ['province_id' => 23, 'name' => 'گچساران'],
            ['province_id' => 23, 'name' => 'دنا'],
            ['province_id' => 23, 'name' => 'دوگنبدان'],
            ['province_id' => 23, 'name' => 'سی سخت'],
            ['province_id' => 23, 'name' => 'دهدشت'],
            ['province_id' => 23, 'name' => 'لیکک'],
            ['province_id' => 24, 'name' => 'گرگان'],
            ['province_id' => 24, 'name' => 'آق قلا'],
            ['province_id' => 24, 'name' => 'گنبد کاووس'],
            ['province_id' => 24, 'name' => 'علی آباد کتول'],
            ['province_id' => 24, 'name' => 'مینو دشت'],
            ['province_id' => 24, 'name' => 'ترکمن'],
            ['province_id' => 24, 'name' => 'کردکوی'],
            ['province_id' => 24, 'name' => 'بندر گز'],
            ['province_id' => 24, 'name' => 'کلاله'],
            ['province_id' => 24, 'name' => 'آزاد شهر'],
            ['province_id' => 24, 'name' => 'رامیان'],
            ['province_id' => 25, 'name' => 'رشت'],
            ['province_id' => 25, 'name' => 'منجیل'],
            ['province_id' => 25, 'name' => 'لنگرود'],
            ['province_id' => 25, 'name' => 'رود سر'],
            ['province_id' => 25, 'name' => 'تالش'],
            ['province_id' => 25, 'name' => 'آستارا'],
            ['province_id' => 25, 'name' => 'ماسوله'],
            ['province_id' => 25, 'name' => 'آستانه اشرفیه'],
            ['province_id' => 25, 'name' => 'رودبار'],
            ['province_id' => 25, 'name' => 'فومن'],
            ['province_id' => 25, 'name' => 'صومعه سرا'],
            ['province_id' => 25, 'name' => 'بندرانزلی'],
            ['province_id' => 25, 'name' => 'کلاچای'],
            ['province_id' => 25, 'name' => 'هشتپر'],
            ['province_id' => 25, 'name' => 'رضوان شهر'],
            ['province_id' => 25, 'name' => 'ماسال'],
            ['province_id' => 25, 'name' => 'شفت'],
            ['province_id' => 25, 'name' => 'سیاهکل'],
            ['province_id' => 25, 'name' => 'املش'],
            ['province_id' => 25, 'name' => 'لاهیجان'],
            ['province_id' => 25, 'name' => 'خشک بیجار'],
            ['province_id' => 25, 'name' => 'خمام'],
            ['province_id' => 25, 'name' => 'لشت نشا'],
            ['province_id' => 25, 'name' => 'بندر کیاشهر'],
            ['province_id' => 26, 'name' => 'خرم آباد'],
            ['province_id' => 26, 'name' => 'ماهشهر'],
            ['province_id' => 26, 'name' => 'دزفول'],
            ['province_id' => 26, 'name' => 'بروجرد'],
            ['province_id' => 26, 'name' => 'دورود'],
            ['province_id' => 26, 'name' => 'الیگودرز'],
            ['province_id' => 26, 'name' => 'ازنا'],
            ['province_id' => 26, 'name' => 'نور آباد'],
            ['province_id' => 26, 'name' => 'کوهدشت'],
            ['province_id' => 26, 'name' => 'الشتر'],
            ['province_id' => 26, 'name' => 'پلدختر'],
            ['province_id' => 27, 'name' => 'ساری'],
            ['province_id' => 27, 'name' => 'آمل'],
            ['province_id' => 27, 'name' => 'بابل'],
            ['province_id' => 27, 'name' => 'بابلسر'],
            ['province_id' => 27, 'name' => 'بهشهر'],
            ['province_id' => 27, 'name' => 'تنکابن'],
            ['province_id' => 27, 'name' => 'جویبار'],
            ['province_id' => 27, 'name' => 'چالوس'],
            ['province_id' => 27, 'name' => 'رامسر'],
            ['province_id' => 27, 'name' => 'سواد کوه'],
            ['province_id' => 27, 'name' => 'قائم شهر'],
            ['province_id' => 27, 'name' => 'نکا'],
            ['province_id' => 27, 'name' => 'نور'],
            ['province_id' => 27, 'name' => 'بلده'],
            ['province_id' => 27, 'name' => 'نوشهر'],
            ['province_id' => 27, 'name' => 'پل سفید'],
            ['province_id' => 27, 'name' => 'محمود آباد'],
            ['province_id' => 27, 'name' => 'فریدون کنار'],
            ['province_id' => 28, 'name' => 'اراک'],
            ['province_id' => 28, 'name' => 'آشتیان'],
            ['province_id' => 28, 'name' => 'تفرش'],
            ['province_id' => 28, 'name' => 'خمین'],
            ['province_id' => 28, 'name' => 'دلیجان'],
            ['province_id' => 28, 'name' => 'ساوه'],
            ['province_id' => 28, 'name' => 'سربند'],
            ['province_id' => 28, 'name' => 'محلات'],
            ['province_id' => 28, 'name' => 'شازند'],
            ['province_id' => 29, 'name' => 'بندرعباس'],
            ['province_id' => 29, 'name' => 'قشم'],
            ['province_id' => 29, 'name' => 'کیش'],
            ['province_id' => 29, 'name' => 'بندر لنگه'],
            ['province_id' => 29, 'name' => 'بستک'],
            ['province_id' => 29, 'name' => 'حاجی آباد'],
            ['province_id' => 29, 'name' => 'دهبارز'],
            ['province_id' => 29, 'name' => 'انگهران'],
            ['province_id' => 29, 'name' => 'میناب'],
            ['province_id' => 29, 'name' => 'ابوموسی'],
            ['province_id' => 29, 'name' => 'بندر جاسک'],
            ['province_id' => 29, 'name' => 'تنب بزرگ'],
            ['province_id' => 29, 'name' => 'بندر خمیر'],
            ['province_id' => 29, 'name' => 'پارسیان'],
            ['province_id' => 29, 'name' => 'قشم'],
            ['province_id' => 30, 'name' => 'همدان'],
            ['province_id' => 30, 'name' => 'ملایر'],
            ['province_id' => 30, 'name' => 'تویسرکان'],
            ['province_id' => 30, 'name' => 'نهاوند'],
            ['province_id' => 30, 'name' => 'کبودر اهنگ'],
            ['province_id' => 30, 'name' => 'رزن'],
            ['province_id' => 30, 'name' => 'اسدآباد'],
            ['province_id' => 30, 'name' => 'بهار'],
            ['province_id' => 31, 'name' => 'یزد'],
            ['province_id' => 31, 'name' => 'تفت'],
            ['province_id' => 31, 'name' => 'اردکان'],
            ['province_id' => 31, 'name' => 'ابرکوه'],
            ['province_id' => 31, 'name' => 'میبد'],
            ['province_id' => 31, 'name' => 'طبس'],
            ['province_id' => 31, 'name' => 'بافق'],
            ['province_id' => 31, 'name' => 'مهریز'],
            ['province_id' => 31, 'name' => 'اشکذر'],
            ['province_id' => 31, 'name' => 'هرات'],
            ['province_id' => 31, 'name' => 'خضرآباد'],
            ['province_id' => 31, 'name' => 'شاهدیه'],
            ['province_id' => 31, 'name' => 'حمیدیه شهر'],
            ['province_id' => 31, 'name' => 'سید میرزا'],
            ['province_id' => 31, 'name' => 'زارچ']
        ]);
    }

}
