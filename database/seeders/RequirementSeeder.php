<?php

namespace Database\Seeders;

use App\Models\SacramentRequirement;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RequirementSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SacramentRequirement::upsert([
            ['id' => '1', 'sacrament_desc' => 'Baptism', 'desc' => <<<EOT
            For a child to be baptized, the parents need to present the child’s birth certificate to confirm age. If an adult is being baptized and was baptized elsewhere, they may need to provide a baptism record from their previous church. Additionally, proof of the godparents' Catholic status is required, typically provided by a letter from their parish confirming they are confirmed Catholics. The dress code for baptism includes white clothing, such as a white baptism gown for babies or a white dress or shirt for adults. Modest attire, like a simple dress shirt and pants for adults, is encouraged.
            EOT
            ],

            ['id' => '2', 'sacrament_desc' => 'Confirmation', 'desc' => <<<EOT
            To be confirmed, one must provide a copy of their baptism certificate from the parish where they were baptized. They also need proof of completion of confirmation classes, usually in the form of a signed certificate or letter from a religious education program. The dress code for confirmation calls for formal attire, with men often wearing suits and women in a nice dress.
            EOT
            ],

            ['id' => '3', 'sacrament_desc' => 'Eucharist (Holy Communion)', 'desc' => <<<EOT
            For a child receiving their First Communion, a copy of their baptism certificate is needed, along with a certificate proving they have completed First Communion classes, often provided by their Sunday school or religious education. The dress code for First Communion includes formal attire, with girls typically in a white dress and boys in a suit or dress shirt and slacks. Adults receiving Communion should wear respectful clothing, such as a collared shirt or blouse with nice pants or a skirt.
            EOT
            ],

            ['id' => '4', 'sacrament_desc' => 'Penance (Confession)', 'desc' => <<<EOT
            If the individual is under age 7 and has not yet received First Communion, they may need to provide a baptism certificate. For the dress code, casual yet respectful clothing, such as a shirt and pants or a modest dress, is suitable.
            EOT
            ],

            ['id' => '5', 'sacrament_desc' => 'Anointing of the Sick', 'desc' => <<<EOT
            No documentation is required for this sacrament. The dress code is simple and should prioritize comfort, with clean clothes appropriate for the setting, whether that’s a hospital gown or regular clothes like a t-shirt and pants if the anointing takes place at home.
            EOT
            ],

            ['id' => '6', 'sacrament_desc' => 'Matrimony', 'desc' => <<<EOT
            Both the bride and groom need to provide copies of their baptismal certificates, proof of marriage preparation completion (usually confirmed by a priest or counselor), and government-issued IDs for at least two witnesses. The dress code for matrimony is formal, with the bride in a wedding gown and the groom in a suit or tuxedo. Groomsmen and bridesmaids also wear coordinated formal attire.
            EOT
            ],

            ['id' => '7', 'sacrament_desc' => 'Funeral (Sacrament of Eucharist)', 'desc' => <<<EOT
            For a Catholic funeral, the family should coordinate with the parish to arrange the funeral Mass, during which the Sacrament of the Eucharist may be offered. The parish may require a copy of the deceased’s baptism certificate. The dress code is respectful and somber, with attendees typically wearing dark-colored attire—such as suits or dress shirts for men, and modest dresses or blouses with skirts or slacks for women.
            EOT
            ],
            ],['id']);
    }
}
