<?php

namespace Database\Seeders\Themes\Catholic;

use Botble\ACL\Models\User;
use Botble\Base\Facades\MetaBox;
use Botble\Blog\Models\Category;
use Botble\Blog\Models\Post;
use Botble\Slug\Facades\SlugHelper;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CatholicPostSeeder extends Seeder
{
    public function run(): void
    {
        $authorId   = User::query()->value('id');
        $authorType = User::class;

        $catIds = Category::query()->pluck('id', 'name');

        $articles = [
            [
                'name'        => 'Understanding the Rosary: A Spiritual Guide for Beginners',
                'description' => 'The Rosary is one of the most beloved Catholic prayers. This guide walks you through each mystery and how to meditate on Christ\'s life.',
                'content'     => '<p>The Holy Rosary is a Scripture-based prayer that begins with the Apostles\' Creed, followed by the Our Father, three Hail Marys for an increase of faith, hope, and charity, and the Glory Be. The Rosary focuses on 20 mysteries that reflect on the life of Jesus and Mary.</p><p>Pope John Paul II called the Rosary "a compendium of the Gospel" — a meditation on the great events of salvation history. It is a powerful intercessory prayer and a means of growing in holiness.</p><h3>The Four Sets of Mysteries</h3><p>The Joyful Mysteries focus on the Incarnation and childhood of Jesus. The Sorrowful Mysteries meditate on His Passion and Death. The Glorious Mysteries celebrate His Resurrection and the glory of Mary. The Luminous Mysteries, added by John Paul II, contemplate Christ\'s public ministry.</p>',
                'category'    => 'Spirituality',
                'tags'        => [2, 6],
            ],
            [
                'name'        => 'Pope Benedict XVI\'s Enduring Legacy in Catholic Theology',
                'description' => 'Joseph Ratzinger\'s theological contributions shaped the post-conciliar Church in profound ways. We examine his most important works.',
                'content'     => '<p>Pope Emeritus Benedict XVI leaves behind a theological legacy of extraordinary depth. His "Introduction to Christianity," written in 1968 as Joseph Ratzinger, remains one of the most important works of 20th-century theology — accessible yet profound, challenging yet comforting.</p><p>His pontificate was marked by an insistence on the "hermeneutic of continuity" in interpreting the Second Vatican Council, arguing that the Council must be read in light of the Church\'s entire tradition, not as a break from it.</p><p>His decision to resign the papacy in 2013 — the first papal resignation in nearly 600 years — demonstrated a profound humility and concern for the good of the universal Church.</p>',
                'category'    => 'Vatican News',
                'tags'        => [5, 10],
            ],
            [
                'name'        => 'The New Evangelization: Bringing the Gospel to a Post-Christian World',
                'description' => 'How can Catholics effectively share their faith in an increasingly secular society? Practical strategies and spiritual principles.',
                'content'     => '<p>The New Evangelization, a term coined by Pope Saint John Paul II, calls Catholics to renew their proclamation of the Gospel especially in societies that were once Christian but have grown distant from the faith.</p><p>This is not a new Gospel, but the ancient Gospel proclaimed with new ardor, new methods, and new expressions. It begins with the interior conversion of every Catholic — we cannot give what we do not have.</p><p>Practical evangelization takes many forms: inviting neighbors to Mass, sharing Catholic media, bearing witness through charitable works, and engaging in respectful dialogue with those of different beliefs.</p>',
                'category'    => 'Catholic Education',
                'tags'        => [1, 5],
            ],
            [
                'name'        => 'Adoration of the Blessed Sacrament: An Ancient Practice Renewed',
                'description' => 'Eucharistic Adoration is experiencing a remarkable renewal across the world. Discover the theology and practice of this powerful devotion.',
                'content'     => '<p>Eucharistic Adoration — spending time in silent prayer before the Body of Christ present in the consecrated Host — has seen a remarkable renewal in recent decades. Perpetual Adoration chapels have multiplied worldwide, drawing thousands to spend time with Jesus in the Blessed Sacrament.</p><p>The theology is straightforward: Catholics believe that Christ is truly, really, and substantially present in the Eucharist. Adoration is simply being with the Lord — listening, speaking, resting in His presence.</p><p>Many saints attributed their holiness to time spent in Adoration. Saint Peter Julian Eymard devoted his life to promoting this devotion and founded the Congregation of the Blessed Sacrament for this purpose.</p>',
                'category'    => 'Spirituality',
                'tags'        => [3, 1],
            ],
            [
                'name'        => 'Catholic Social Teaching: A Primer on the Church\'s Vision for Society',
                'description' => 'The Church\'s social doctrine offers a comprehensive vision of the just society. Here is an introduction to its seven key principles.',
                'content'     => '<p>Catholic Social Teaching (CST) is a body of doctrine that has developed over more than a century, beginning with Pope Leo XIII\'s landmark encyclical <em>Rerum Novarum</em> in 1891. It addresses the social, political, and economic questions of each age in the light of the Gospel.</p><p>The seven key principles include: the life and dignity of the human person; the call to family, community, and participation; rights and responsibilities; the option for the poor and vulnerable; the dignity of work and the rights of workers; solidarity; and care for God\'s creation.</p><p>CST is a rich treasury often called "the Church\'s best kept secret" — yet it offers the most coherent and comprehensive vision of the just society available in our time.</p>',
                'category'    => 'Catholic Culture',
                'tags'        => [10, 5],
            ],
            [
                'name'        => 'St. Teresa of Ávila: Doctor of the Church and Master of Prayer',
                'description' => 'On her feast day, we explore the life and spiritual teachings of this 16th-century mystic and reformer.',
                'content'     => '<p>Teresa of Ávila (1515–1582) was a Spanish mystic, Carmelite nun, author, and theologian. In 1970, she and Catherine of Siena became the first women to be declared Doctors of the Church by Pope Paul VI.</p><p>Her two most important works are <em>The Way of Perfection</em>, a guide to prayer and religious life, and <em>The Interior Castle</em> (or <em>The Mansions</em>), a masterful description of the soul\'s journey toward God. The latter uses the image of a castle with seven sets of rooms to describe the stages of prayer and spiritual growth.</p><p>Her famous words remain an encouragement to every Christian: "Let nothing disturb you, let nothing frighten you, all things are passing away: God never changes. Patience obtains all things. Whoever has God lacks nothing; God alone suffices."</p>',
                'category'    => 'Saints & Feast Days',
                'tags'        => [9, 2],
            ],
            [
                'name'        => 'The Traditional Latin Mass: History, Beauty, and Ongoing Debate',
                'description' => 'The ancient Rite of Mass continues to attract a growing number of Catholics. We explore its history and its place in today\'s Church.',
                'content'     => '<p>The Traditional Latin Mass (TLM), also called the Extraordinary Form or the Tridentine Mass, is the form of Mass codified by the Council of Trent in the 16th century and used by the Latin Rite of the Church until the liturgical reforms following the Second Vatican Council in the 1960s.</p><p>The TLM is celebrated primarily in Latin, with the priest facing the altar (ad orientem) for much of the Mass. It is characterized by a profound silence, rich ceremony, and a strong emphasis on the sacrificial nature of the Eucharist.</p><p>Pope Benedict XVI issued <em>Summorum Pontificum</em> in 2007, liberalizing access to the TLM. This decision was partially reversed by Pope Francis in <em>Traditionis Custodes</em> (2021), sparking an ongoing discussion in the Church about liturgical diversity and unity.</p>',
                'category'    => 'Sacraments & Liturgy',
                'tags'        => [7, 1],
            ],
            [
                'name'        => 'Mercy and Justice: Cardinal Cupich on Prison Ministry',
                'description' => 'Cardinal Blase Cupich of Chicago speaks about the Church\'s commitment to those incarcerated and to restorative justice.',
                'content'     => '<p>The Catholic Church has a long history of ministry to prisoners, inspired by Christ\'s words in Matthew 25: "I was in prison and you came to me." From prison chaplains to organizations like Dismas Ministry and Prison Fellowship, Catholics have sought to bring the Gospel behind bars.</p><p>Cardinal Cupich recently spoke at a symposium on restorative justice, emphasizing that the Church must advocate for a criminal justice system that prioritizes rehabilitation and human dignity over punishment alone.</p><p>"We cannot claim to be a Church of mercy," he said, "while remaining indifferent to a system that warehouses human beings and makes rehabilitation nearly impossible."</p>',
                'category'    => 'World News',
                'tags'        => [10, 5],
            ],
            [
                'name'        => 'The Liturgy of the Hours: Praying with the Church Throughout the Day',
                'description' => 'The Divine Office is the official prayer of the Catholic Church. Learn how laypeople can participate in this ancient practice.',
                'content'     => '<p>The Liturgy of the Hours (also called the Divine Office or the Breviary) is the official prayer of the universal Church, traditionally prayed by priests, deacons, and members of religious orders throughout each day. In recent decades, many laypeople have discovered and embraced this ancient form of prayer.</p><p>The Hours divide the day into moments of prayer: Lauds (Morning Prayer), Daytime Prayer, Vespers (Evening Prayer), and Compline (Night Prayer). The Office of Readings allows for an extended meditation on Scripture and writings of the saints.</p><p>Digital apps like <em>iBreviary</em> and <em>Universalis</em> have made the Liturgy of the Hours more accessible than ever for busy laypeople who wish to unite their prayer with the worldwide Church.</p>',
                'category'    => 'Spirituality',
                'tags'        => [2, 10],
            ],
            [
                'name'        => 'Youth Ministry in Crisis: How Parishes Are Winning Back Young Catholics',
                'description' => 'Many parishes are finding creative and effective ways to form and retain young people in the faith. Here are their strategies.',
                'content'     => '<p>Statistics on young people leaving the Catholic Church are well known and sobering. Yet across the country, vibrant parishes are bucking this trend through intentional, relationship-based youth ministry.</p><p>The most effective programs share common characteristics: they prioritize personal encounter with Jesus Christ over mere information; they involve young people as active participants rather than passive audiences; they connect teens with adult mentors who model authentic Catholic faith; and they provide genuine community where belonging and friendship can grow.</p><p>Organizations like Life Teen, FOCUS (Fellowship of Catholic University Students), and NET Ministries have developed proven methodologies that are transforming parishes and campuses nationwide.</p>',
                'category'    => 'Catholic Education',
                'tags'        => [10, 5],
            ],
            [
                'name'        => 'Confession: Why This Sacrament Is the Greatest Gift for Sinners',
                'description' => 'The Sacrament of Penance is often misunderstood or feared. Discover why the saints called it the greatest sacrament after the Eucharist.',
                'content'     => '<p>The Sacrament of Reconciliation (Confession) is one of the most misunderstood sacraments in the Church. Many Catholics have stopped going to Confession, either out of embarrassment, a sense that their sins are not serious enough, or a misunderstanding of the sacrament\'s nature.</p><p>Yet the saints consistently proclaimed Confession as a source of extraordinary grace and healing. Saint John Vianney, the patron of parish priests, spent up to 16 hours a day hearing confessions — the penitents who came to him numbered in the hundreds of thousands annually.</p><p>To receive the sacrament worthily, one needs: an examination of conscience, contrition (sorrow for sin), the intention to avoid future sin, confession of all mortal sins to a priest, and acceptance of a penance. The formula of absolution — "I absolve you from your sins in the name of the Father, and of the Son, and of the Holy Spirit" — are among the most powerful words a human being can hear.</p>',
                'category'    => 'Sacraments & Liturgy',
                'tags'        => [1, 2],
            ],
            [
                'name'        => 'World Youth Day: Building the Church of Tomorrow',
                'description' => 'From Rome in 1985 to Lisbon in 2023, World Youth Day has been one of the greatest engines of Catholic renewal in the modern era.',
                'content'     => '<p>World Youth Day, the international Catholic festival for young people organized by the Holy See, has gathered millions of young Catholics in cities across the world since its founding by Pope John Paul II in 1985.</p><p>The Lisbon 2023 World Youth Day drew an estimated 1.5 million pilgrims for the closing Mass. Pope Francis celebrated with them and offered a message of hope, urging young Catholics to be "protagonists of hope" in a troubled world.</p><p>Many Catholics trace their deepest spiritual experiences to a World Youth Day pilgrimage. The combination of massive communal prayer, catechetical events, encounters with the Pope, and time with Catholics from every nation creates an experience that is genuinely transformative.</p>',
                'category'    => 'World News',
                'tags'        => [9, 10],
            ],
            [
                'name'        => 'Book Review: "Catholicism" by Bishop Robert Barron',
                'description' => 'Bishop Barron\'s landmark work remains the definitive modern introduction to Catholic faith. A review of its key themes and enduring value.',
                'content'     => '<p>Bishop Robert Barron\'s <em>Catholicism: A Journey to the Heart of the Faith</em> (2011) is a masterwork of popular Catholic theology. Written as a companion to his celebrated documentary series of the same name, it distills two thousand years of Catholic thought, art, spirituality, and history into an accessible and beautifully written volume.</p><p>Barron\'s central argument is that Catholicism is a "both/and" tradition: both faith and reason, both Scripture and Tradition, both individual and communal, both the transcendent God and the fully human Jesus. This integration is what makes Catholicism intellectually credible and spiritually nourishing.</p><p>The book is organized around the central affirmations of the Creed, moving from God and creation through Jesus and the Church to Mary and the saints. Each chapter is enriched by references to art, architecture, literature, and the lives of exemplary Catholics.</p>',
                'category'    => 'Opinion & Commentary',
                'tags'        => [5, 10],
            ],
        ];

        foreach ($articles as $data) {
            // Skip if title already exists
            if (Post::query()->where('name', $data['name'])->exists()) {
                continue;
            }

            $catName = $data['category'];
            $catId   = $catIds->get($catName) ?? $catIds->first();

            $post = Post::query()->create([
                'name'        => $data['name'],
                'description' => $data['description'],
                'content'     => $data['content'],
                'status'      => 'published',
                'author_id'   => $authorId,
                'author_type' => $authorType,
                'views'       => rand(150, 3500),
                'is_featured' => rand(0, 1),
            ]);

            $post->categories()->sync([$catId]);

            if (!empty($data['tags'])) {
                $post->tags()->sync($data['tags']);
            }

            SlugHelper::createSlug($post);
        }

        $this->command->info('Catholic articles seeded: ' . count($articles) . ' processed.');
    }
}
