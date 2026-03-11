<?php

namespace Database\Seeders;

use App\Models\Graduate;
use App\Models\LibraryItem;
use App\Models\News;
use App\Models\NewsCategory;
use App\Models\Product;
use App\Models\Role;
use App\Models\Story;
use App\Models\Tag;
use App\Models\TourismService;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RoleSeeder::class,
            NewsCategorySeeder::class,
            TagSeeder::class,
        ]);

        $adminRole = Role::where('slug', 'administrator')->first();

        if ($adminRole) {
            User::firstOrCreate(
                ['email' => 'admin@iesi.local'],
                [
                    'name' => 'Administrador IESI',
                    'role_id' => $adminRole->id,
                    'password' => Hash::make('password'),
                ]
            );
        }

        $faker = \Faker\Factory::create('es_AR');
        $graduateRole = Role::where('slug', 'graduate')->first();
        $categories = NewsCategory::all();
        $tags = Tag::all();

        $graduates = collect();

        for ($i = 0; $i < 3; $i++) {
            $user = User::firstOrCreate(
                ['email' => "egresado{$i}@iesi.local"],
                [
                    'name' => $faker->name(),
                    'role_id' => $graduateRole?->id,
                    'password' => Hash::make('password'),
                ]
            );

            $graduate = Graduate::firstOrCreate(
                ['user_id' => $user->id],
                [
                    'name' => $user->name,
                    'community' => $faker->city(),
                    'biography' => $faker->paragraphs(2, true),
                    'photo' => 'https://images.unsplash.com/photo-1487412720507-e7ab37603c6f?auto=format&fit=crop&w=600&q=80',
                    'contact_info' => ['email' => $user->email, 'phone' => $faker->phoneNumber()],
                ]
            );

            Product::firstOrCreate(
                ['graduate_id' => $graduate->id, 'name' => "Producto artesanal {$i}"],
                [
                    'description' => $faker->sentence(),
                    'images' => ['https://images.unsplash.com/photo-1519681393784-d120267933ba?auto=format&fit=crop&w=600&q=80'],
                    'contact_info' => ['email' => $user->email],
                    'is_featured' => $i === 0,
                ]
            );

            TourismService::firstOrCreate(
                ['graduate_id' => $graduate->id, 'name' => "Servicio turístico {$i}"],
                [
                    'description' => $faker->sentence(),
                    'region' => $faker->state(),
                    'images' => ['https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=600&q=80'],
                    'contact_info' => ['email' => $user->email],
                    'is_featured' => $i === 0,
                ]
            );

            $graduates->push($graduate);
        }

        for ($i = 0; $i < 3; $i++) {
            $title = "Noticia institucional {$i}";
            $news = News::firstOrCreate(
                ['slug' => Str::slug($title)],
                [
                    'news_category_id' => $categories->random()->id ?? null,
                    'author_id' => User::where('role_id', $adminRole?->id)->first()?->id,
                    'title' => $title,
                    'excerpt' => $faker->sentence(),
                    'content' => $faker->paragraphs(4, true),
                    'featured_image' => 'https://images.unsplash.com/photo-1456406644174-8ddd4cd52a06?auto=format&fit=crop&w=900&q=80',
                    'gallery' => [],
                    'video_url' => null,
                    'is_featured' => $i === 0,
                    'published_at' => now()->subDays(5 - $i),
                ]
            );

            if ($tags->isNotEmpty()) {
                $news->tags()->syncWithoutDetaching($tags->random(min(2, $tags->count()))->pluck('id'));
            }
        }

        for ($i = 0; $i < 3; $i++) {
            $title = "Historia intercultural {$i}";
            Story::firstOrCreate(
                ['slug' => Str::slug($title)],
                [
                    'author_id' => User::where('role_id', $adminRole?->id)->first()?->id,
                    'type' => ['docente', 'egresado', 'comunidad'][$i % 3],
                    'title' => $title,
                    'content' => $faker->paragraphs(5, true),
                    'featured_image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=900&q=80',
                    'gallery' => [],
                    'video_url' => null,
                    'audio_url' => null,
                    'is_featured' => $i === 0,
                    'published_at' => now()->subDays(10 - $i),
                ]
            );
        }

        for ($i = 0; $i < 4; $i++) {
            LibraryItem::firstOrCreate(
                ['title' => "Recurso intercultural {$i}"],
                [
                    'description' => $faker->sentence(),
                    'type' => $i % 2 === 0 ? 'file' : 'external',
                    'file_path' => $i % 2 === 0 ? 'library/ejemplo.pdf' : null,
                    'external_url' => $i % 2 === 0 ? null : 'https://www.youtube.com/',
                    'category' => $i % 2 === 0 ? 'Documentos' : 'Videos',
                    'published_at' => now()->subDays(3 + $i),
                ]
            );
        }
    }
}
