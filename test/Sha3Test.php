<?php

namespace bb\Sha3\Test;

use PHPUnit_Framework_TestCase;
use bb\Sha3\Sha3;

class Sha3Test extends PHPUnit_Framework_TestCase
{

    public function  testSha3()
    {
        $this->assertEquals(Sha3::hash("", 512),
            'a69f73cca23a9ac5c8b567dc185a756e97c982164fe25859e0d1dcc1475c80a615b2123af1f5f94c11e3e9402c3ac558f500199d95b6d3e301758586281dcd26');
        $this->assertEquals(Sha3::hash("The quick brown fox jumps over the lazy dog", 512),
            '01dedd5de4ef14642445ba5f5b97c15e47b9ad931326e4b0727cd94cefc44fff23f07bf543139939b49128caf436dc1bdee54fcb24023a08d9403f9b4bf0d450');
        $this->assertEquals(Sha3::hash("The quick brown fox jumps over the lazy dog.", 512),
            '18f4f4bd419603f95538837003d9d254c26c23765565162247483f65c50303597bc9ce4d289f21d1c2f1f458828e33dc442100331b35e7eb031b5d38ba6460f8');

        $this->assertEquals(Sha3::hash("", 384),
            '0c63a75b845e4f7d01107d852e4c2485c51a50aaaa94fc61995e71bbee983a2ac3713831264adb47fb6bd1e058d5f004');
        $this->assertEquals(Sha3::hash("The quick brown fox jumps over the lazy dog", 384),
            '7063465e08a93bce31cd89d2e3ca8f602498696e253592ed26f07bf7e703cf328581e1471a7ba7ab119b1a9ebdf8be41');
        $this->assertEquals(Sha3::hash("The quick brown fox jumps over the lazy dog.", 384),
            '1a34d81695b622df178bc74df7124fe12fac0f64ba5250b78b99c1273d4b080168e10652894ecad5f1f4d5b965437fb9');


        $this->assertEquals(Sha3::hash("", 256), 'a7ffc6f8bf1ed76651c14756a061d662f580ff4de43b49fa82d80a4b80f8434a');
        $this->assertEquals(Sha3::hash("The quick brown fox jumps over the lazy dog", 256),
            '69070dda01975c8c120c3aada1b282394e7f032fa9cf32f4cb2259a0897dfc04');
        $this->assertEquals(Sha3::hash("The quick brown fox jumps over the lazy dog.", 256),
            'a80f839cd4f83f6c3dafc87feae470045e4eb0d366397d5c6ce34ba1739f734d');


        $this->assertEquals(Sha3::hash("", 224), '6b4e03423667dbb73b6e15454f0eb1abd4597f9a1b078e3f5b5a6bc7');
        $this->assertEquals(Sha3::hash("The quick brown fox jumps over the lazy dog", 224),
            'd15dadceaa4d5d7bb3b48f446421d542e08ad8887305e28d58335795');
        $this->assertEquals(Sha3::hash("The quick brown fox jumps over the lazy dog.", 224),
            '2d0708903833afabdd232a20201176e8b58c5be8a6fe74265ac54db0');


        $msg = "3A3A819C48EFDE2AD914FBF00E18AB6BC4F14513AB27D0C178A188B61431E7F5623CB66B23346775D386B50E982C493ADBBFC54B9A3CD383382336A1A0B2150A15358F336D03AE18F666C7573D55C4FD181C29E6CCFDE63EA35F0ADF5885CFC0A3D84A2B2E4DD24496DB789E663170CEF74798AA1BBCD4574EA0BBA40489D764B2F83AADC66B148B4A0CD95246C127D5871C4F11418690A5DDF01246A0C80A43C70088B6183639DCFDA4125BD113A8F49EE23ED306FAAC576C3FB0C1E256671D817FC2534A52F5B439F72E424DE376F4C565CCA82307DD9EF76DA5B7C4EB7E085172E328807C02D011FFBF33785378D79DC266F6A5BE6BB0E4A92ECEEBAEB1";
        $this->assertEquals(Sha3::hash(hex2bin($msg), 512),
            '6e8b8bd195bdd560689af2348bdc74ab7cd05ed8b9a57711e9be71e9726fda4591fee12205edacaf82ffbbaf16dff9e702a708862080166c2ff6ba379bc7ffc2');

        $msg = "9F2FCC7C90DE090D6B87CD7E9718C1EA6CB21118FC2D5DE9F97E5DB6AC1E9C10";
        $this->assertEquals(Sha3::hash(hex2bin($msg), 256),
            '2f1a5f7159e34ea19cddc70ebf9b81f1a66db40615d7ead3cc1f1b954d82a3af');


        $msg = "E35780EB9799AD4C77535D4DDB683CF33EF367715327CF4C4A58ED9CBDCDD486F669F80189D549A9364FA82A51A52654EC721BB3AAB95DCEB4A86A6AFA93826DB923517E928F33E3FBA850D45660EF83B9876ACCAFA2A9987A254B137C6E140A21691E1069413848";
        $this->assertEquals(Sha3::hash(hex2bin($msg), 384),
            'd1c0fa85c8d183beff99ad9d752b263e286b477f79f0710b010317017397813344b99daf3bb7b1bc5e8d722bac85943a');


        $this->assertEquals(Sha3::hash("", 224, true),
            hex2bin('6b4e03423667dbb73b6e15454f0eb1abd4597f9a1b078e3f5b5a6bc7'));
    }


    public function  testShake()
    {
        $this->assertEquals(Sha3::shake("", 128, 256),
            '7f9c2ba4e88f827d616045507605853ed73b8093f6efbc88eb1a6eacfa66ef26');
        $this->assertEquals(Sha3::shake("", 256, 512),
            '46b9dd2b0ba88d13233b3feb743eeb243fcd52ea62b81b82b50c27646ed5762fd75dc4ddd8c0f200cb05019d67b592f6fc821c49479ab48640292eacb3b7c4be');


        $this->assertEquals(Sha3::shake("The quick brown fox jumps over the lazy dog", 128, 256),
            'f4202e3c5852f9182a0430fd8144f0a74b95e7417ecae17db0f8cfeed0e3e66e');
        $this->assertEquals(Sha3::shake("The quick brown fox jumps over the lazy dof", 128, 256),
            '853f4538be0db9621a6cea659a06c1107b1f83f02b13d18297bd39d7411cf10c');

        $this->assertEquals(Sha3::shake("", 128, 256, true),
            hex2bin('7f9c2ba4e88f827d616045507605853ed73b8093f6efbc88eb1a6eacfa66ef26'));
    }


}