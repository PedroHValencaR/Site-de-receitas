<?php
/* * ============================================================
 * CONEXÃO COM BANCO DE DADOS E LÓGICA BACK-END
 * Baseado nos conceitos de PHP e SQL
 * ============================================================
 */

// Configurações do Banco de Dados (XAMPP Padrão)
$host = 'localhost';
$dbname = 'receitas_db';
$user = 'root';
$pass = '';

try {
    // Criação da instância PDO (PHP Data Objects) para conexão segura
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $user, $pass);
    
    // Configura o PHP para lançar exceções em caso de erro no banco
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // 1. Consulta SQL para buscar receitas da categoria 'regionais'
    $queryRegionais = "SELECT * FROM receitas WHERE categoria = 'regionais'";
    $stmtRegionais = $pdo->query($queryRegionais);
    $receitasRegionais = $stmtRegionais->fetchAll(PDO::FETCH_ASSOC);

    // 2. Consulta SQL para buscar receitas da categoria 'vistas' (Opcional, se você adicionou no banco)
    $queryVistas = "SELECT * FROM receitas WHERE categoria = 'vistas'";
    $stmtVistas = $pdo->query($queryVistas);
    $receitasVistas = $stmtVistas->fetchAll(PDO::FETCH_ASSOC);

// 3. Consulta SQL para buscar as 3 ÚLTIMAS receitas adicionadas (Recentes)
    // "ORDER BY id DESC" ordena do maior ID (novo) para o menor. "LIMIT 3" pega só 3.
    $queryRecentes = "SELECT * FROM receitas ORDER BY id DESC LIMIT 3";
    $stmtRecentes = $pdo->query($queryRecentes);
    $receitasRecentes = $stmtRecentes->fetchAll(PDO::FETCH_ASSOC);

} catch (PDOException $e) {
    // Se houver erro na conexão, exibe a mensagem e para a execução
    die("Erro na conexão com o banco de dados: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Receitas+ - Descubra as melhores receitas regionais e internacionais.">
    
    <title>Home | Receitas+</title>

    <script src="https://kit.fontawesome.com/a39dd60c9e.js" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="./css/main.css">
    <link rel="stylesheet" href="./css/bar.css">
    <link rel="stylesheet" href="./css/home.css">
  </head>
  
  <body>
    
    <header id="header_page">
      <h1>
        <i class="fa-solid fa-bowl-food"></i>
        Receitas+
      </h1>
      <nav>
        <ul>
          <li><a href="#">Home</a></li>
          <li><a href="#main_page">Receitas</a></li>
          <li><a href="lista.html">Quem Somos</a></li>
        </ul>
      </nav>
      <div>
        <button id="btn_login" type="button">Login</button>
        <button id="btn_register" type="button">Registrar</button>
      </div>
    </header>

    <div id="cover"></div>
    <section id="hero_page">
      <span>Venha descobrir as melhores receitas para cada momento</span>
    </section>

    <main id="main_page">
      
      <section class="section_horizontal" id="mais_vistas">
        <h2>Receitas mais vistas</h2>
        <div class="container_cards" style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
            
            <?php if(count($receitasVistas) > 0): ?>
                <?php foreach ($receitasVistas as $receita): ?>
                    
                    <article class="section_card">
                        <img src="<?php echo $receita['imagem']; ?>" alt="Foto de <?php echo $receita['titulo']; ?>">
                        <div>
                            <h3><?php echo $receita['titulo']; ?></h3>
                            <p><?php echo $receita['descricao']; ?></p>
                            
                            <a href="<?php echo !empty($receita['link']) ? $receita['link'] : '#'; ?>" target="_blank" class="btn_receita">
                                Ver Receita Completa
                            </a>
                            
                        </div>
                    </article>

                <?php endforeach; ?>
            <?php else: ?>
                <p>Nenhuma receita em destaque no momento.</p>
            <?php endif; ?>

        </div>
      </section>

      <section class="section_horizontal" id="recentes">
        <h2>Receitas mais recentes</h2>
        <div class="container_cards" style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
          
          <?php if(count($receitasRecentes) > 0): ?>
              <?php foreach ($receitasRecentes as $receita): ?>
                  
                  <article class="section_card">
                    <img src="<?php echo $receita['imagem']; ?>" alt="<?php echo $receita['titulo']; ?>">
                    <div>
                      <h3><?php echo $receita['titulo']; ?></h3>
                      <p><?php echo $receita['descricao']; ?></p>
                      
                      <a href="<?php echo !empty($receita['link']) ? $receita['link'] : '#'; ?>" target="_blank" class="btn_receita">
                        Ler na Wikipedia
                      </a>
                    </div>
                  </article>

              <?php endforeach; ?>
          <?php else: ?>
              <p>Ainda não há receitas recentes.</p>
          <?php endif; ?>

        </div>
      </section>
      
      <section class="section_horizontal" id="regionais">
        <h2>Receitas Regionais</h2>
        <div class="container_cards" style="display: flex; gap: 20px; justify-content: center; flex-wrap: wrap;">
          
          <?php 
            if(count($receitasRegionais) > 0):
                foreach ($receitasRegionais as $receita): 
          ?>
            
            <article class="section_card">
                <img src="<?php echo $receita['imagem']; ?>" alt="<?php echo $receita['titulo']; ?>">
                <div>
                  <h3><?php echo $receita['titulo']; ?></h3>
                  <p><?php echo $receita['descricao']; ?></p>
                  
                  <a href="<?php echo !empty($receita['link']) ? $receita['link'] : '#'; ?>" target="_blank" class="btn_receita">
                    Ler na Wikipedia
                  </a>

                </div>
            </article>

          <?php 
                endforeach; 
            else:
          ?>
            <p class="aviso">Nenhuma receita regional encontrada.</p>
          <?php endif; ?>

        </div>
      </section>

    </main>

    <footer id="footer_page">
      <h3>
        <i class="fa-solid fa-bowl-food"></i>
        Receitas+
      </h3>
      
      <div style="margin: 10px 0;">
        <a href="#" style="color: white; margin-right: 15px;">Termos de Uso</a>
        <a href="#" style="color: white;">Política de Privacidade</a>
      </div>

      <div>
        <span>Redes sociais:</span>
        <div>
          <i class="fa-brands fa-youtube"></i>
          <i class="fa-brands fa-x-twitter"></i>
          <i class="fa-brands fa-facebook"></i>
          <i class="fa-brands fa-pinterest"></i>
        </div>
      </div>
      <p>&copy; 2023 Receitas+. Todos os direitos reservados.</p>
    </footer>

    <script src="./js/script.js"></script>

  </body>
</html>