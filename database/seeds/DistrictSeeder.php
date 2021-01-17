<?php

use Illuminate\Database\Seeder;
use App\District;

class DistrictSeeder extends Seeder
{
    public function run()
    {
            District::Create(["id" => "1", "division_id" => "3", "name" => "Dhaka", "bn_name" => "ঢাকা", "lat" => "23.7115253", "lon" => "90.4111451", "website" => "www.dhaka.gov.bd", "status" => "Active"]);
            District::Create(["id" => "2", "division_id" => "3", "name" => "Faridpur", "bn_name" => "ফরিদপুর", "lat" => "23.6070822", "lon" => "89.8429406", "website" => "www.faridpur.gov.bd", "status" => "Active"]);
            District::Create(["id" => "3", "division_id" => "3", "name" => "Gazipur", "bn_name" => "গাজীপুর", "lat" => "24.0022858", "lon" => "90.4264283", "website" => "www.gazipur.gov.bd", "status" => "Active"]);
            District::Create(["id" => "4", "division_id" => "3", "name" => "Gopalganj", "bn_name" => "গোপালগঞ্জ", "lat" => "23.0050857", "lon" => "89.8266059", "website" => "www.gopalganj.gov.bd", "status" => "Active"]);
            District::Create(["id" => "5", "division_id" => "8", "name" => "Jamalpur", "bn_name" => "জামালপুর", "lat" => "24.937533", "lon" => "89.937775", "website" => "www.jamalpur.gov.bd", "status" => "Active"]);
            District::Create(["id" => "6", "division_id" => "3", "name" => "Kishoreganj", "bn_name" => "কিশোরগঞ্জ", "lat" => "24.444937", "lon" => "90.776575", "website" => "www.kishoreganj.gov.bd", "status" => "Active"]);
            District::Create(["id" => "7", "division_id" => "3", "name" => "Madaripur", "bn_name" => "মাদারীপুর", "lat" => "23.164102", "lon" => "90.1896805", "website" => "www.madaripur.gov.bd", "status" => "Active"]);
            District::Create(["id" => "8", "division_id" => "3", "name" => "Manikganj", "bn_name" => "মানিকগঞ্জ", "lat" => "0", "lon" => "0", "website" => "www.manikganj.gov.bd", "status" => "Active"]);
            District::Create(["id" => "9", "division_id" => "3", "name" => "Munshiganj", "bn_name" => "মুন্সিগঞ্জ", "lat" => "0", "lon" => "0", "website" => "www.munshiganj.gov.bd", "status" => "Active"]);
            District::Create(["id" => "10", "division_id" => "8", "name" => "Mymensingh", "bn_name" => "ময়মনসিংহ", "lat" => "0", "lon" => "0", "website" => "www.mymensingh.gov.bd", "status" => "Active"]);
            District::Create(["id" => "11", "division_id" => "3", "name" => "Narayanganj", "bn_name" => "নারায়াণগঞ্জ", "lat" => "23.63366", "lon" => "90.496482", "website" => "www.narayanganj.gov.bd", "status" => "Active"]);
            District::Create(["id" => "12", "division_id" => "3", "name" => "Narsingdi", "bn_name" => "নরসিংদী", "lat" => "23.932233", "lon" => "90.71541", "website" => "www.narsingdi.gov.bd", "status" => "Active"]);
            District::Create(["id" => "13", "division_id" => "8", "name" => "Netrokona", "bn_name" => "নেত্রকোণা", "lat" => "24.870955", "lon" => "90.727887", "website" => "www.netrokona.gov.bd", "status" => "Active"]);
            District::Create(["id" => "14", "division_id" => "3", "name" => "Rajbari", "bn_name" => "রাজবাড়ি", "lat" => "23.7574305", "lon" => "89.6444665", "website" => "www.rajbari.gov.bd", "status" => "Active"]);
            District::Create(["id" => "15", "division_id" => "3", "name" => "Shariatpur", "bn_name" => "শরীয়তপুর", "lat" => "0", "lon" => "0", "website" => "www.shariatpur.gov.bd", "status" => "Active"]);
            District::Create(["id" => "16", "division_id" => "8", "name" => "Sherpur", "bn_name" => "শেরপুর", "lat" => "25.0204933", "lon" => "90.0152966", "website" => "www.sherpur.gov.bd", "status" => "Active"]);
            District::Create(["id" => "17", "division_id" => "3", "name" => "Tangail", "bn_name" => "টাঙ্গাইল", "lat" => "0", "lon" => "0", "website" => "www.tangail.gov.bd", "status" => "Active"]);
            District::Create(["id" => "18", "division_id" => "5", "name" => "Bogura", "bn_name" => "বগুড়া", "lat" => "24.8465228", "lon" => "89.377755", "website" => "www.bogra.gov.bd", "status" => "Active"]);
            District::Create(["id" => "19", "division_id" => "5", "name" => "Joypurhat", "bn_name" => "জয়পুরহাট", "lat" => "0", "lon" => "0", "website" => "www.joypurhat.gov.bd", "status" => "Active"]);
            District::Create(["id" => "20", "division_id" => "5", "name" => "Naogaon", "bn_name" => "নওগাঁ", "lat" => "0", "lon" => "0", "website" => "www.naogaon.gov.bd", "status" => "Active"]);
            District::Create(["id" => "21", "division_id" => "5", "name" => "Natore", "bn_name" => "নাটোর", "lat" => "24.420556", "lon" => "89.000282", "website" => "www.natore.gov.bd", "status" => "Active"]);
            District::Create(["id" => "22", "division_id" => "5", "name" => "Nawabganj", "bn_name" => "নবাবগঞ্জ", "lat" => "24.5965034", "lon" => "88.2775122", "website" => "www.chapainawabganj.gov.bd", "status" => "Active"]);
            District::Create(["id" => "23", "division_id" => "5", "name" => "Pabna", "bn_name" => "পাবনা", "lat" => "23.998524", "lon" => "89.233645", "website" => "www.pabna.gov.bd", "status" => "Active"]);
            District::Create(["id" => "24", "division_id" => "5", "name" => "Rajshahi", "bn_name" => "রাজশাহী", "lat" => "0", "lon" => "0", "website" => "www.rajshahi.gov.bd", "status" => "Active"]);
            District::Create(["id" => "25", "division_id" => "5", "name" => "Sirajgonj", "bn_name" => "সিরাজগঞ্জ", "lat" => "24.4533978", "lon" => "89.7006815", "website" => "www.sirajganj.gov.bd", "status" => "Active"]);
            District::Create(["id" => "26", "division_id" => "6", "name" => "Dinajpur", "bn_name" => "দিনাজপুর", "lat" => "25.6217061", "lon" => "88.6354504", "website" => "www.dinajpur.gov.bd", "status" => "Active"]);
            District::Create(["id" => "27", "division_id" => "6", "name" => "Gaibandha", "bn_name" => "গাইবান্ধা", "lat" => "25.328751", "lon" => "89.528088", "website" => "www.gaibandha.gov.bd", "status" => "Active"]);
            District::Create(["id" => "28", "division_id" => "6", "name" => "Kurigram", "bn_name" => "কুড়িগ্রাম", "lat" => "25.805445", "lon" => "89.636174", "website" => "www.kurigram.gov.bd", "status" => "Active"]);
            District::Create(["id" => "29", "division_id" => "6", "name" => "Lalmonirhat", "bn_name" => "লালমনিরহাট", "lat" => "0", "lon" => "0", "website" => "www.lalmonirhat.gov.bd", "status" => "Active"]);
            District::Create(["id" => "30", "division_id" => "6", "name" => "Nilphamari", "bn_name" => "নীলফামারী", "lat" => "25.931794", "lon" => "88.856006", "website" => "www.nilphamari.gov.bd", "status" => "Active"]);
            District::Create(["id" => "31", "division_id" => "6", "name" => "Panchagarh", "bn_name" => "পঞ্চগড়", "lat" => "26.3411", "lon" => "88.5541606", "website" => "www.panchagarh.gov.bd", "status" => "Active"]);
            District::Create(["id" => "32", "division_id" => "6", "name" => "Rangpur", "bn_name" => "রংপুর", "lat" => "25.7558096", "lon" => "89.244462", "website" => "www.rangpur.gov.bd", "status" => "Active"]);
            District::Create(["id" => "33", "division_id" => "6", "name" => "Thakurgaon", "bn_name" => "ঠাকুরগাঁও", "lat" => "26.0336945", "lon" => "88.4616834", "website" => "www.thakurgaon.gov.bd", "status" => "Active"]);
            District::Create(["id" => "34", "division_id" => "1", "name" => "Barguna", "bn_name" => "বরগুনা", "lat" => "0", "lon" => "0", "website" => "www.barguna.gov.bd", "status" => "Active"]);
            District::Create(["id" => "35", "division_id" => "1", "name" => "Barishal", "bn_name" => "বরিশাল", "lat" => "0", "lon" => "0", "website" => "www.barisal.gov.bd", "status" => "Active"]);
            District::Create(["id" => "36", "division_id" => "1", "name" => "Bhola", "bn_name" => "ভোলা", "lat" => "22.685923", "lon" => "90.648179", "website" => "www.bhola.gov.bd", "status" => "Active"]);
            District::Create(["id" => "37", "division_id" => "1", "name" => "Jhalokati", "bn_name" => "ঝালকাঠি", "lat" => "0", "lon" => "0", "website" => "www.jhalakathi.gov.bd", "status" => "Active"]);
            District::Create(["id" => "38", "division_id" => "1", "name" => "Patuakhali", "bn_name" => "পটুয়াখালী", "lat" => "22.3596316", "lon" => "90.3298712", "website" => "www.patuakhali.gov.bd", "status" => "Active"]);
            District::Create(["id" => "39", "division_id" => "1", "name" => "Pirojpur", "bn_name" => "পিরোজপুর", "lat" => "0", "lon" => "0", "website" => "www.pirojpur.gov.bd", "status" => "Active"]);
            District::Create(["id" => "40", "division_id" => "2", "name" => "Bandarban", "bn_name" => "বান্দরবান", "lat" => "22.1953275", "lon" => "92.2183773", "website" => "www.bandarban.gov.bd", "status" => "Active"]);
            District::Create(["id" => "41", "division_id" => "2", "name" => "Brahmanbaria", "bn_name" => "ব্রাহ্মণবাড়িয়া", "lat" => "23.9570904", "lon" => "91.1119286", "website" => "www.brahmanbaria.gov.bd", "status" => "Active"]);
            District::Create(["id" => "42", "division_id" => "2", "name" => "Chandpur", "bn_name" => "চাঁদপুর", "lat" => "23.2332585", "lon" => "90.6712912", "website" => "www.chandpur.gov.bd", "status" => "Active"]);
            District::Create(["id" => "43", "division_id" => "2", "name" => "Chattogram", "bn_name" => "চট্টগ্রাম", "lat" => "22.335109", "lon" => "91.834073", "website" => "www.chittagong.gov.bd", "status" => "Active"]);
            District::Create(["id" => "44", "division_id" => "2", "name" => "Cumilla", "bn_name" => "কুমিল্লা", "lat" => "23.4682747", "lon" => "91.1788135", "website" => "www.comilla.gov.bd", "status" => "Active"]);
            District::Create(["id" => "45", "division_id" => "2", "name" => "Cox's Bazar", "bn_name" => "কক্স বাজার", "lat" => "0", "lon" => "0", "website" => "www.coxsbazar.gov.bd", "status" => "Active"]);
            District::Create(["id" => "46", "division_id" => "2", "name" => "Feni", "bn_name" => "ফেনী", "lat" => "23.023231", "lon" => "91.3840844", "website" => "www.feni.gov.bd", "status" => "Active"]);
            District::Create(["id" => "47", "division_id" => "2", "name" => "Khagrachari", "bn_name" => "খাগড়াছড়ি", "lat" => "23.119285", "lon" => "91.984663", "website" => "www.khagrachhari.gov.bd", "status" => "Active"]);
            District::Create(["id" => "48", "division_id" => "2", "name" => "Lakshmipur", "bn_name" => "লক্ষ্মীপুর", "lat" => "22.942477", "lon" => "90.841184", "website" => "www.lakshmipur.gov.bd", "status" => "Active"]);
            District::Create(["id" => "49", "division_id" => "2", "name" => "Noakhali", "bn_name" => "নোয়াখালী", "lat" => "22.869563", "lon" => "91.099398", "website" => "www.noakhali.gov.bd", "status" => "Active"]);
            District::Create(["id" => "50", "division_id" => "2", "name" => "Rangamati", "bn_name" => "রাঙ্গামাটি", "lat" => "0", "lon" => "0", "website" => "www.rangamati.gov.bd", "status" => "Active"]);
            District::Create(["id" => "51", "division_id" => "7", "name" => "Habiganj", "bn_name" => "হবিগঞ্জ", "lat" => "24.374945", "lon" => "91.41553", "website" => "www.habiganj.gov.bd", "status" => "Active"]);
            District::Create(["id" => "52", "division_id" => "7", "name" => "Maulvibazar", "bn_name" => "মৌলভীবাজার", "lat" => "24.482934", "lon" => "91.777417", "website" => "www.moulvibazar.gov.bd", "status" => "Active"]);
            District::Create(["id" => "53", "division_id" => "7", "name" => "Sunamganj", "bn_name" => "সুনামগঞ্জ", "lat" => "25.0658042", "lon" => "91.3950115", "website" => "www.sunamganj.gov.bd", "status" => "Active"]);
            District::Create(["id" => "54", "division_id" => "7", "name" => "Sylhet", "bn_name" => "সিলেট", "lat" => "24.8897956", "lon" => "91.8697894", "website" => "www.sylhet.gov.bd", "status" => "Active"]);
            District::Create(["id" => "55", "division_id" => "4", "name" => "Bagerhat", "bn_name" => "বাগেরহাট", "lat" => "22.651568", "lon" => "89.785938", "website" => "www.bagerhat.gov.bd", "status" => "Active"]);
            District::Create(["id" => "56", "division_id" => "4", "name" => "Chuadanga", "bn_name" => "চুয়াডাঙ্গা", "lat" => "23.6401961", "lon" => "88.841841", "website" => "www.chuadanga.gov.bd", "status" => "Active"]);
            District::Create(["id" => "57", "division_id" => "4", "name" => "Jashore", "bn_name" => "যশোর", "lat" => "23.16643", "lon" => "89.2081126", "website" => "www.jessore.gov.bd", "status" => "Active"]);
            District::Create(["id" => "58", "division_id" => "4", "name" => "Jhenaidah", "bn_name" => "ঝিনাইদহ", "lat" => "23.5448176", "lon" => "89.1539213", "website" => "www.jhenaidah.gov.bd", "status" => "Active"]);
            District::Create(["id" => "59", "division_id" => "4", "name" => "Khulna", "bn_name" => "খুলনা", "lat" => "22.815774", "lon" => "89.568679", "website" => "www.khulna.gov.bd", "status" => "Active"]);
            District::Create(["id" => "60", "division_id" => "4", "name" => "Kushtia", "bn_name" => "কুষ্টিয়া", "lat" => "23.901258", "lon" => "89.120482", "website" => "www.kushtia.gov.bd", "status" => "Active"]);
            District::Create(["id" => "61", "division_id" => "4", "name" => "Magura", "bn_name" => "মাগুরা", "lat" => "23.487337", "lon" => "89.419956", "website" => "www.magura.gov.bd", "status" => "Active"]);
            District::Create(["id" => "62", "division_id" => "4", "name" => "Meherpur", "bn_name" => "মেহেরপুর", "lat" => "23.762213", "lon" => "88.631821", "website" => "www.meherpur.gov.bd", "status" => "Active"]);
            District::Create(["id" => "63", "division_id" => "4", "name" => "Narail", "bn_name" => "নড়াইল", "lat" => "23.172534", "lon" => "89.512672", "website" => "www.narail.gov.bd", "status" => "Active"]);
            District::Create(["id" => "64", "division_id" => "4", "name" => "Satkhira", "bn_name" => "সাতক্ষীরা", "lat" => "0", "lon" => "0", "website" => "www.satkhira.gov.bd", "status" => "Active"]);
    }
}
