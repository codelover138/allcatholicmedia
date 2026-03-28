<?php

namespace Database\Seeders\Themes\Catholic;

use Botble\ACL\Models\User;
use Botble\Blog\Models\Post;
use Botble\Slug\Facades\SlugHelper;
use Illuminate\Database\Seeder;

class CatholicSaintsSeeder extends Seeder
{
    public function run(): void
    {
        $authorId   = User::query()->value('id');
        $authorType = User::class;
        $catId      = 3; // Saints & Feast Days

        $saints = [
            [
                'name'        => 'St. Francis of Assisi — Patron of Animals and Ecology',
                'description' => 'Giovanni di Pietro di Bernardone, known as Francis of Assisi, was an Italian friar, deacon, mystic, and preacher. He founded the Franciscan Order. His feast day is October 4.',
                'content'     => '<p>Saint Francis of Assisi (1181/1182 – 1226) is one of the most venerated religious figures in history. Born into a wealthy merchant family in Assisi, Italy, he renounced his inheritance after a dramatic conversion experience and dedicated his life to radical poverty and service to the poor.</p><p>Francis founded the Order of Friars Minor (the Franciscans), the Order of Saint Clare (the Poor Clares) with Saint Clare of Assisi, and the Third Order of Saint Francis. He is known for his love of nature — reflected in his Canticle of the Sun — and for receiving the stigmata, the five wounds of Christ, in 1224.</p><p>Pope John Paul II named him patron of ecology in 1979. Pope Francis chose his papal name in honor of Saint Francis.</p>',
            ],
            [
                'name'        => 'St. Thomas Aquinas — Doctor Angelicus',
                'description' => 'Thomas Aquinas was an Italian Dominican friar, philosopher, Catholic priest, and Doctor of the Church. His greatest work, the Summa Theologiae, remains a cornerstone of Catholic theology. Feast day: January 28.',
                'content'     => '<p>Saint Thomas Aquinas (1225–1274) is widely considered the greatest philosopher and theologian of the medieval period. Born into a noble family in Aquino, Italy, he joined the Dominican Order against his family\'s wishes and went on to produce one of the most comprehensive syntheses of Christian theology and Aristotelian philosophy ever written.</p><p>His masterwork, the <em>Summa Theologiae</em>, organized Catholic doctrine into a coherent whole and addressed the relationship between faith and reason, the existence and nature of God, the sacraments, the virtues, and the moral life. It remains a primary reference for Catholic theology and philosophy.</p><p>Pope Leo XIII, in his encyclical <em>Aeterni Patris</em> (1879), declared Aquinas the foremost Catholic philosopher and recommended his works as the foundation of Catholic intellectual formation.</p>',
            ],
            [
                'name'        => 'St. Joan of Arc — Maid of Orléans',
                'description' => 'Joan of Arc was a French peasant girl who, claiming divine guidance, led the French army to several important victories during the Hundred Years\' War. She was burned at the stake at age 19. Feast day: May 30.',
                'content'     => '<p>Saint Joan of Arc (c. 1412–1431), known as the Maid of Orléans, is one of the most remarkable figures in medieval history. Born to a peasant family in Domrémy, France, she claimed to have received visions from Saint Michael, Saint Catherine of Alexandria, and Saint Margaret from the age of 13, directing her to support the Dauphin Charles VII of France and recover France from English domination.</p><p>She persuaded the Dauphin to allow her to accompany the royal army to Orléans, which was under siege. Her presence reinvigorated French troops, and Orléans was relieved in 1429 — a turning point in the Hundred Years\' War. She was present at the coronation of Charles VII at Reims.</p><p>Captured by the Burgundians and sold to the English, she was tried for heresy and burned at the stake in Rouen on May 30, 1431. She was only about 19 years old. Twenty-five years later, an inquisitorial court authorized by Pope Callixtus III examined the trial, found her innocent, and declared her a martyr. She was canonized by Pope Benedict XV in 1920.</p>',
            ],
            [
                'name'        => 'St. John Paul II — The Great Pilgrim Pope',
                'description' => 'Karol Józef Wojtyła served as Pope from 1978 to 2005. He is one of the most influential leaders of the 20th century. His pontificate of nearly 27 years was the third longest in history. Feast day: October 22.',
                'content'     => '<p>Saint John Paul II (1920–2005), born Karol Józef Wojtyła, served as Pope of the Catholic Church from October 1978 until his death in April 2005. He was the first non-Italian pope since Adrian VI in 1523 and the first Polish pope.</p><p>His pontificate was one of the most consequential of the modern era. He played a significant role in the collapse of communist regimes in Poland and Eastern Europe. He canonized more saints than any of his predecessors combined — 482 in total — and beatified 1,340 people.</p><p>Among his greatest contributions was the development of the Theology of the Body, a comprehensive theological reflection on human sexuality, marriage, and the human person. He also instituted World Youth Day, which has drawn millions of young Catholics together across the globe since 1985.</p><p>He was beatified by Pope Benedict XVI in 2011 and canonized by Pope Francis on April 27, 2014 — Divine Mercy Sunday.</p>',
            ],
            [
                'name'        => 'St. Faustina Kowalska — Apostle of Divine Mercy',
                'description' => 'Helena Kowalska, known in religious life as Sister Maria Faustina, was a Polish nun who reported visions of Jesus Christ and wrote the Diary of Divine Mercy. Feast day: October 5.',
                'content'     => '<p>Saint Faustina Kowalska (1905–1938), born Helena Kowalska, was a Polish nun and mystic who is venerated in the Catholic Church as the "Apostle of Divine Mercy." Her spiritual diary, written under obedience to her confessor Blessed Michał Sopoćko, describes her mystical experiences and the messages she claimed to have received from Jesus Christ regarding divine mercy.</p><p>The devotion to Divine Mercy that she promoted includes the Divine Mercy image (with the inscription "Jesus, I trust in You"), the Chaplet of Divine Mercy, and the Feast of Divine Mercy (celebrated on the Second Sunday of Easter). Jesus reportedly told her: "I desire that the Feast of Mercy be a refuge and shelter for all souls, and especially for poor sinners."</p><p>She died of tuberculosis at the age of 33 in Kraków. She was beatified by Pope John Paul II in 1993 and canonized by him in Rome on April 30, 2000 — the first Sunday after Easter, which he simultaneously established as Divine Mercy Sunday for the universal Church.</p>',
            ],
            [
                'name'        => 'St. Augustine of Hippo — Doctor of Grace',
                'description' => 'Aurelius Augustinus Hipponensis was a theologian and philosopher from Roman Africa. One of the most important Church Fathers, his writings profoundly influenced Western Christianity and philosophy. Feast day: August 28.',
                'content'     => '<p>Saint Augustine of Hippo (354–430) is one of the most important figures in the development of Western Christianity and philosophy. Born in Thagaste (modern Algeria), he led a dissolute youth before his dramatic conversion to Christianity in Milan in 386, heavily influenced by Saint Ambrose and his own mother, Saint Monica.</p><p>His two most famous works are the <em>Confessions</em> — an autobiographical account of his conversion and a profound meditation on the soul\'s restlessness apart from God — and <em>The City of God</em>, a monumental work of Christian philosophy written in response to the sack of Rome in 410.</p><p>His famous prayer — "Lord, make me chaste, but not yet" — captures the struggle of a soul torn between the world and God. His equally famous insight — "You have made us for yourself, O Lord, and our heart is restless until it rests in You" — remains one of the most quoted lines in spiritual literature.</p><p>He is the patron saint of brewers, printers, theologians, the alleviation of sore eyes, and a number of cities and dioceses.</p>',
            ],
            [
                'name'        => 'St. Thérèse of Lisieux — The Little Flower',
                'description' => 'Marie-Françoise-Thérèse Martin was a French Carmelite nun. Her autobiography, The Story of a Soul, introduced her "Little Way" of spiritual childhood. She is a Doctor of the Church. Feast day: October 1.',
                'content'     => '<p>Saint Thérèse of Lisieux (1873–1897), known as "The Little Flower," was a French Carmelite nun whose autobiography <em>Story of a Soul</em> made her one of the most beloved saints of the modern era. She died of tuberculosis at the age of 24, having never left her convent or performed any remarkable external deeds — yet Pope Pius X called her "the greatest saint of modern times."</p><p>Her "Little Way" — performing ordinary actions with extraordinary love and trust in God — made holiness accessible to everyone. She wrote: "Love proves itself by deeds, so how am I to show my love? Great deeds are forbidden me. The only way I can prove my love is by scattering flowers and these flowers are every little sacrifice, every glance and word, and the doing of the least actions for love."</p><p>She was canonized in 1925, just 28 years after her death. In 1997, Pope John Paul II declared her a Doctor of the Church — making her the third woman (after Teresa of Ávila and Catherine of Siena) to receive this distinction.</p>',
            ],
            [
                'name'        => 'St. Padre Pio — Stigmatist of the 20th Century',
                'description' => 'Francesco Forgione, known as Padre Pio, was an Italian Capuchin friar, priest, and mystic who bore the stigmata for 50 years. He was canonized in 2002. Feast day: September 23.',
                'content'     => '<p>Saint Padre Pio of Pietrelcina (1887–1968), born Francesco Forgione, was an Italian Capuchin friar and priest who is venerated in the Catholic Church as a saint. He is well known for bearing the stigmata — the wounds of Christ\'s crucifixion — for 50 years, from 1918 until his death in 1968.</p><p>Padre Pio was reported to have bilocation, the ability to be in two places at once. Numerous accounts attest to his gift of reading souls in confession, prophecy, and healing. He reportedly converted many people and brought countless lapsed Catholics back to the sacraments.</p><p>He founded the Casa Sollievo della Sofferenza (Home for the Relief of Suffering), a hospital in San Giovanni Rotondo, in 1956. Today it is one of the most modern and well-equipped hospitals in Italy.</p><p>Padre Pio\'s most famous saying: "Pray, hope, and don\'t worry. Worry is useless. God is merciful and will hear your prayer."</p><p>He was beatified by Pope John Paul II in 1999 and canonized on June 16, 2002.</p>',
            ],
            [
                'name'        => 'St. Catherine of Siena — Doctor of the Church',
                'description' => 'Catherine Benincasa was a lay member of the Dominican Order who lived during the 14th century. She is a Doctor of the Church and patron of Italy and Europe. Feast day: April 29.',
                'content'     => '<p>Saint Catherine of Siena (1347–1380) was an Italian tertiary of the Dominican Order and a Scholastic philosopher and theologian. She is venerated in the Catholic Church as a Doctor of the Church — one of only four women to hold this title.</p><p>Born the 24th child of a cloth dyer in Siena, she began having visions from the age of six. As a young woman she cared for the poor and sick in Siena before becoming an influential figure in Italian politics and in the Church.</p><p>Her most notable letters were to Pope Gregory XI, whom she addressed bluntly as "Babbo" (father) and urged to return the papacy from Avignon to Rome — which he ultimately did in 1377. Her major work, <em>The Dialogue of Divine Providence</em> (or simply <em>The Dialogue</em>), is a series of conversations between God the Father and a soul who represents Catherine herself.</p><p>She was canonized by Pope Pius II in 1461, proclaimed a Doctor of the Church by Pope Paul VI in 1970, and named a patron of Europe by Pope John Paul II in 1999.</p>',
            ],
        ];

        $added = 0;
        foreach ($saints as $data) {
            if (Post::query()->where('name', $data['name'])->exists()) {
                continue;
            }

            $post = Post::query()->create([
                'name'        => $data['name'],
                'description' => $data['description'],
                'content'     => $data['content'],
                'status'      => 'published',
                'author_id'   => $authorId,
                'author_type' => $authorType,
                'views'       => rand(80, 1800),
                'is_featured' => rand(0, 1),
            ]);

            $post->categories()->sync([$catId]);
            $post->tags()->sync([9]); // Saints tag

            SlugHelper::createSlug($post);
            $added++;
        }

        $this->command->info("Saints seeded: {$added} added.");
    }
}
