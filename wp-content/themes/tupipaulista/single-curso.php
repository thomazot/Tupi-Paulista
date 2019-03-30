<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package zot
 */

get_header();
$content = apply_filters( 'the_content', $post->post_content );

?>
    <?php include_once  'inc/banner.php'; ?>
    <main id="main" class="main">

        <div class="main__container">

            <nav class="menu menu--anchor">
                <ul>
                    <li class="actived"><a href="#objetivos">Objetivos</a></li>
                    <li><a href="#perfil">Perfil do egresso</a></li>
                    <li><a href="#gradecurricular">Grade Curricular</a></li>
                    <li><a href="#corpodocente">Corpo Docente</a></li>
                </ul>
            </nav>


            <h2 class="title"><a name="objetivos">Objetivos</a></h2>
            <?php echo get_field('objetivo'); ?>

            <h2 class="title"><a name="perfil">Perfil do egresso</a></h2>
            <?php echo get_field('perfil'); ?>

            <h2 class="title"><a name="gradecurricular">Grade Curricular</a></h2>
            <?php
            $table = false;
            $tableGrade = get_field( 'tabela_grade_curricular' );
            if(is_array($tableGrade)) {
                foreach ($tableGrade as $grade) {
                    $table = $grade['semestre'];
                    if ($table) {

                        echo '<table class="grid__table" border="0">';
                        if ($table['header']) {

                            echo '<thead>';
                            echo '<tr>';

                            foreach ($table['header'] as $th) {

                                echo '<th>';
                                echo $th['c'];
                                echo '</th>';
                            }

                            echo '</tr>';
                            echo '</thead>';
                        }

                        echo '<tbody>';
                        foreach ($table['body'] as $tr) {
                            $html = '';
                            $class = '';
                            $array = array('total', 'sub total', 'carga horária total do curso', 'subtotal');

                            foreach ($tr as $td) {

                                if (in_array(strtolower(trim($td['c'])), $array)) $class = 'bold';
                                $html .= '<td>' . $td['c'] . '</td>';

                            }
                            echo '<tr class="' . $class . '">';
                            echo $html;
                            echo '</tr>';
                        }

                        echo '</tbody>';
                        echo '</table>';
                    }
                }
            }
            ?>

            <h2 class="title"><a name="corpodocente">Corpo Docente</a></h2>

            <?php

            $table = get_field( 'tabela_corpo_docente' );

            if ( $table ) {

                echo '<table class="grid__table" border="0">';
                if ( $table['header'] ) {

                    echo '<thead>';
                    echo '<tr>';

                    foreach ( $table['header'] as $th ) {

                        echo '<th>';
                        echo $th['c'];
                        echo '</th>';
                    }

                    echo '</tr>';
                    echo '</thead>';
                }

                echo '<tbody>';
                foreach ( $table['body'] as $tr ) {

                    echo '<tr>';

                    foreach ( $tr as $td ) {

                        echo '<td>';
                        echo $td['c'];
                        echo '</td>';
                    }

                    echo '</tr>';
                }

                echo '</tbody>';
                echo '</table>';
            }

            ?>
        </div>
        <article class="message sticky">
            <div class="info-curso">
                <?php

                $vestibular = get_field('vestibular');
                $linkVestibular = get_field('link_vestibular');
                if($vestibular && $linkVestibular):
                    ?>
                    <div class="message__vestibular">
                        <a href="<?php echo $linkVestibular; ?>" class="button button--vestibular">
                            <span>
                                <strong>Vestibular</strong>
                                Faça sua inscrição
                            </span>
                        </a>
                    </div>
                <?php endif; ?>

                <div class="info-curso__item info-curso__item--duration">
                    <div>
                        <h4 class="title">Duração</h4>
                        <p><?php the_field('duracao') ?></p>
                    </div>
                </div>
                <div class="info-curso__item info-curso__item--presencial">
                    <div>
                        <h4 class="title">Presencial</h4>
                        <p><?php the_field('presencial') ?></p>
                    </div>
                </div>

                <div class="info-curso__item info-curso__item--coordenador">
                    <div>
                        <h4 class="title">COORDENADOR(A)</h4>
                        <p><?php the_field('coordenador') ?></p>
                    </div>
                </div>
            </div>
            <div class="info-extra">
                <h4 class="title">Dados de Criação/Autorização:</h4>
                <div class="info-extra__container">
                    <?php echo the_field('criacao'); ?>
                </div>
                <h4 class="title">RECONHECIMENTO:</h4>
                <div class="info-extra__container">
                    <?php echo the_field('reconhecimento'); ?>
                </div>
            </div>
        </article>
    </main>

<?php

get_footer();
