<?php
namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;

class ProductsSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'category_id' => 2,
                'name' => 'majoo Pro',
                'description' => 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Accusamus consectetur commodi alias a sit voluptas, porro repellendus quia impedit perspiciatis excepturi veritatis maiores itaque laborum dolor eligendi inventore soluta magnam.',
                'price' => 2750000,
                'image' => '/images/standard_repo.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'category_id' => 2,
                'name' => 'majoo Advance',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Minus facilis quis enim corrupti cupiditate eius voluptatum officiis similique quo error provident hic quidem, libero ipsum. Corporis minus dolorem sed eum?',
                'price' => 2750000,
                'image' => '/images/paket-advance.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'category_id' => 2,
                'name' => 'majoo Lifestyle',
                'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Officia aspernatur quod provident saepe aliquid molestiae error veritatis nulla ipsum dolorum odio corporis deleniti enim id sapiente possimus, reiciendis accusamus. Sed!',
                'price' => 2750000,
                'image' => '/images/paket-lifestyle.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ],
            [
                'category_id' => 1,
                'name' => 'majoo Desktop',
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident possimus commodi vitae qui maxime accusamus inventore asperiores neque ea aperiam ipsa eligendi alias facere tempore optio recusandae, et cumque voluptate.',
                'price' => 2750000,
                'image' => '/images/paket-desktop.png',
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ]
        ];

        foreach ($data as $item) {
            $this->db->table('products')->insert($item);
        }
    }
}
