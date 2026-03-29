<?php

namespace Database\Seeders;

use App\Models\PodcastEpisode;
use App\Models\PodcastShow;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class PodcastShowSeeder extends Seeder
{
    public function run(): void
    {
        $shows = [
            [
                'name'        => 'Catholic Answers Live',
                'slug'        => 'catholic-answers-live',
                'category'    => 'Apologetics',
                'description' => 'The premier Catholic call-in radio program defending and explaining the Faith. Hosted daily with expert apologists answering your questions live.',
                'thumbnail'   => 'https://is1-ssl.mzstatic.com/image/thumb/Podcasts122/v4/9f/2e/8a/9f2e8a3e-6c3e-7d6e-5f6e-8c3e9f2e8a3e/mza_18363578029310015684.jpg/600x600bb.jpg',
                'website_url' => 'https://www.catholic.com/audio/cal',
                'sort_order'  => 1,
                'episodes' => [
                    ['title' => 'Answering Protestant Objections to Catholicism', 'episode_number' => 301, 'duration' => '52:14', 'embed_type' => 'soundcloud', 'embed_url' => 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1402662799', 'description' => 'Jimmy Akin tackles the most common Protestant objections to Catholic doctrine with clarity and charity.', 'published_at' => '2025-10-15'],
                    ['title' => 'The Real Presence: What Catholics Believe', 'episode_number' => 300, 'duration' => '48:30', 'embed_type' => 'soundcloud', 'embed_url' => 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1366030390', 'description' => 'A deep dive into the Eucharist — transubstantiation, the scriptural basis, and Church Fathers.', 'published_at' => '2025-10-08', 'is_featured' => true],
                    ['title' => 'Mary: Mother of God Explained', 'episode_number' => 299, 'duration' => '55:00', 'embed_type' => 'soundcloud', 'embed_url' => 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1307931589', 'description' => 'Why do Catholics call Mary the Mother of God? The biblical and theological case.', 'published_at' => '2025-10-01'],
                    ['title' => 'Purgatory: Scripture and Tradition', 'episode_number' => 298, 'duration' => '51:45', 'embed_type' => 'soundcloud', 'embed_url' => 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1026620971', 'description' => 'Exploring the Catholic teaching on purgatory from Scripture, the early Church, and the councils.', 'published_at' => '2025-09-24'],
                ],
            ],
            [
                'name'        => 'Word on Fire Show',
                'slug'        => 'word-on-fire-show',
                'category'    => 'Theology & Culture',
                'description' => 'Bishop Robert Barron explores the intersection of Catholic faith and contemporary culture — films, books, philosophy, and the New Evangelization.',
                'thumbnail'   => 'https://is1-ssl.mzstatic.com/image/thumb/Podcasts125/v4/5a/8d/2c/5a8d2c3e-7f4e-9a2e-6b8c-1d5e3a7f4e9a/mza_3497889046498574697.jpg/600x600bb.jpg',
                'website_url' => 'https://www.wordonfire.org/podcast',
                'sort_order'  => 2,
                'episodes' => [
                    ['title' => 'The Gospel of Mark: A Deep Reading', 'episode_number' => 212, 'duration' => '38:22', 'embed_type' => 'youtube', 'embed_url' => 'https://www.youtube.com/embed/JZ8LJuPVvUo', 'description' => 'Bishop Barron walks through the Gospel of Mark and its unique theological vision.', 'published_at' => '2025-11-10', 'is_featured' => true],
                    ['title' => 'Aquinas and the Five Ways', 'episode_number' => 211, 'duration' => '44:15', 'embed_type' => 'youtube', 'embed_url' => 'https://www.youtube.com/embed/TgisehuGOyY', 'description' => "St. Thomas Aquinas's classic proofs for God's existence examined for the modern mind.", 'published_at' => '2025-11-03'],
                    ['title' => 'Flannery O\'Connor: Prophet of the South', 'episode_number' => 210, 'duration' => '41:50', 'embed_type' => 'youtube', 'embed_url' => 'https://www.youtube.com/embed/fh7DzJkBVas', 'description' => "Bishop Barron on the strange grace found in Flannery O'Connor's Catholic fiction.", 'published_at' => '2025-10-27'],
                ],
            ],
            [
                'name'        => 'The Vatican Podcast',
                'slug'        => 'vatican-podcast',
                'category'    => 'News & Commentary',
                'description' => 'Daily news and analysis from Vatican Radio and Vatican News — papal audiences, Church documents, world Catholicism, and the Holy See.',
                'thumbnail'   => 'https://upload.wikimedia.org/wikipedia/commons/thumb/0/00/Holy_See_Coat_of_Arms.svg/600px-Holy_See_Coat_of_Arms.svg.png',
                'website_url' => 'https://www.vaticannews.va/en/podcast.html',
                'sort_order'  => 3,
                'episodes' => [
                    ['title' => 'Pope Francis on the Synod: Key Takeaways', 'episode_number' => 88, 'duration' => '22:40', 'embed_type' => 'soundcloud', 'embed_url' => 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/2112004353', 'description' => "A summary of the Holy Father's reflections following the Synod on Synodality.", 'published_at' => '2025-10-30', 'is_featured' => true],
                    ['title' => 'Cardinal Müller: The Faith of the Church', 'episode_number' => 87, 'duration' => '28:55', 'embed_type' => 'soundcloud', 'embed_url' => 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1026621250', 'description' => "Cardinal Müller discusses doctrinal clarity and the Church's unchanging deposit of faith.", 'published_at' => '2025-10-23'],
                    ['title' => "World Youth Day: Pilgrimage of the Heart", 'episode_number' => 86, 'duration' => '19:30', 'embed_type' => 'soundcloud', 'embed_url' => 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1402662799', 'description' => 'Reflections and testimonies from young pilgrims at World Youth Day.', 'published_at' => '2025-10-16'],
                ],
            ],
            [
                'name'        => 'Ascension Presents',
                'slug'        => 'ascension-presents-podcast',
                'category'    => 'Bible Study & Formation',
                'description' => 'Short, engaging Catholic talks from the team at Ascension — Scripture, the sacraments, prayer, and growing in the Faith every day.',
                'thumbnail'   => 'https://is1-ssl.mzstatic.com/image/thumb/Podcasts125/v4/3b/7c/5e/3b7c5e2a-9f1e-4d8b-a3c6-7e2b5f9e1d4a/mza_8796543210987654321.jpg/600x600bb.jpg',
                'website_url' => 'https://ascensionpress.com/pages/ascension-presents',
                'sort_order'  => 4,
                'episodes' => [
                    ['title' => 'Why the Rosary Changes Everything', 'episode_number' => 156, 'duration' => '12:30', 'embed_type' => 'youtube', 'embed_url' => 'https://www.youtube.com/embed/4NMj4-6VFoI', 'description' => 'Fr. Mike Schmitz explains how daily Rosary transforms your prayer life and draws you closer to Christ.', 'published_at' => '2025-11-05', 'is_featured' => true],
                    ['title' => 'How to Go to Confession (and Actually Mean It)', 'episode_number' => 155, 'duration' => '15:45', 'embed_type' => 'youtube', 'embed_url' => 'https://www.youtube.com/embed/z0VKzMnC8vU', 'description' => 'A practical guide to making a good Confession — preparation, Act of Contrition, and penance.', 'published_at' => '2025-10-29'],
                    ['title' => 'The Mass Explained in 10 Minutes', 'episode_number' => 154, 'duration' => '10:55', 'embed_type' => 'youtube', 'embed_url' => 'https://www.youtube.com/embed/WVLJ-Kz8v_c', 'description' => 'Every part of the Mass has deep meaning — here is what is really happening at the altar.', 'published_at' => '2025-10-22'],
                    ['title' => 'Adoration: How to Spend an Hour with Jesus', 'episode_number' => 153, 'duration' => '14:20', 'embed_type' => 'youtube', 'embed_url' => 'https://www.youtube.com/embed/LuP0I4xDnMM', 'description' => 'Practical tips for spending an hour in Eucharistic Adoration — even if you do not know how to start.', 'published_at' => '2025-10-15'],
                ],
            ],
            [
                'name'        => 'The Catholic Man Show',
                'slug'        => 'catholic-man-show',
                'category'    => 'Men\'s Spirituality',
                'description' => 'Helping Catholic men become better husbands, fathers, and disciples. Beer, bourbon, and brotherhood — with serious conversations about faith and virtue.',
                'thumbnail'   => 'https://is1-ssl.mzstatic.com/image/thumb/Podcasts122/v4/7a/3c/9f/7a3c9f2e-8b5e-4d1a-9c7e-3f2e8b5e4d1a/mza_12345678901234567.jpg/600x600bb.jpg',
                'website_url' => 'https://www.catholicmanshow.com',
                'sort_order'  => 5,
                'episodes' => [
                    ['title' => 'Raising Sons to Be Men of God', 'episode_number' => 78, 'duration' => '58:10', 'embed_type' => 'soundcloud', 'embed_url' => 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1366030390', 'description' => 'How to form your sons in virtue, faith, and masculine identity in a world that attacks both.', 'published_at' => '2025-11-08', 'is_featured' => true],
                    ['title' => 'The Domestic Church: Dad as Priest', 'episode_number' => 77, 'duration' => '52:40', 'embed_type' => 'soundcloud', 'embed_url' => 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1307931589', 'description' => "What does it mean for a father to be the 'priest' of his household? A practical breakdown.", 'published_at' => '2025-11-01'],
                    ['title' => 'Pornography, Purity, and Redemption', 'episode_number' => 76, 'duration' => '61:25', 'embed_type' => 'soundcloud', 'embed_url' => 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1026620971', 'description' => 'A frank, Catholic conversation about purity, the battle against pornography, and finding freedom.', 'published_at' => '2025-10-25'],
                ],
            ],
            [
                'name'        => 'EWTN Catholicism in Focus',
                'slug'        => 'ewtn-catholicism-in-focus',
                'category'    => 'Devotional & Prayer',
                'description' => 'Daily Catholic reflection, news, and devotional content from EWTN — the Global Catholic Television Network.',
                'thumbnail'   => 'https://is1-ssl.mzstatic.com/image/thumb/Podcasts125/v4/9c/4b/7a/9c4b7a3e-5f2e-8d1b-6c9e-4b7a3e5f2e8d/mza_9876543210123456789.jpg/600x600bb.jpg',
                'website_url' => 'https://www.ewtn.com/radio',
                'sort_order'  => 6,
                'episodes' => [
                    ['title' => 'Morning Prayer: The Liturgy of the Hours', 'episode_number' => 44, 'duration' => '18:00', 'embed_type' => 'soundcloud', 'embed_url' => 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/2112004353', 'description' => 'Praying Morning Prayer from the Divine Office — psalms, readings, intercessions.', 'published_at' => '2025-11-12', 'is_featured' => true],
                    ['title' => "The Holy Rosary: Glorious Mysteries", 'episode_number' => 43, 'duration' => '22:15', 'embed_type' => 'soundcloud', 'embed_url' => 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1026621250', 'description' => 'Pray the Glorious Mysteries of the Rosary with traditional meditations and guidance.', 'published_at' => '2025-11-05'],
                    ['title' => 'Divine Mercy Chaplet', 'episode_number' => 42, 'duration' => '16:30', 'embed_type' => 'soundcloud', 'embed_url' => 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1402662799', 'description' => 'Pray the Divine Mercy Chaplet as revealed to Saint Faustina Kowalska.', 'published_at' => '2025-10-29'],
                    ['title' => "Saint of the Day: St. Thérèse of Lisieux", 'episode_number' => 41, 'duration' => '14:45', 'embed_type' => 'soundcloud', 'embed_url' => 'https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/1366030390', 'description' => "The life, writings, and Little Way of St. Thérèse — Doctor of the Church.", 'published_at' => '2025-10-01'],
                ],
            ],
        ];

        foreach ($shows as $showData) {
            $episodes = $showData['episodes'];
            unset($showData['episodes']);

            $show = PodcastShow::query()->updateOrCreate(
                ['slug' => $showData['slug']],
                array_merge($showData, ['is_active' => true])
            );

            foreach ($episodes as $epData) {
                PodcastEpisode::query()->updateOrCreate(
                    ['podcast_show_id' => $show->id, 'title' => $epData['title']],
                    array_merge($epData, [
                        'podcast_show_id' => $show->id,
                        'slug'            => \Illuminate\Support\Str::slug($epData['title']),
                        'is_featured'     => $epData['is_featured'] ?? false,
                        'published_at'    => Carbon::parse($epData['published_at']),
                    ])
                );
            }
        }

        $this->command->info('Seeded ' . count($shows) . ' podcast shows with episodes.');
    }
}
