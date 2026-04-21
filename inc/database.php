<?php

    // PDO Database Connection (Singleton)
    global $pdo_connection;
    
    function open_database() {
        global $pdo_connection;
        
        try {
            if ($pdo_connection === null) {
                $dsn = "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4";
                $pdo_connection = new PDO($dsn, DB_USER, DB_PASSWORD, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES => false,
                ]);
            }
            return $pdo_connection;
        } catch (PDOException $e) {
            echo "Erro de conexão: " . $e->getMessage();
            return null;
        }
    }

    function close_database($conn = null) {
        // PDO connections are automatically closed when the object is destroyed
        // No need to manually close
        return true;
    }

/**
 *  Pesquisa um Registro pelo ID em uma Tabela
 */
  function find( $table = null, $id = null ) {
    
    $database = open_database();
    $found = null;

    try {
      if ($id) {
        $sql = "SELECT * FROM " . $table . " WHERE id = ?";
        $stmt = $database->prepare($sql);
        $stmt->execute([$id]);
        $found = $stmt->fetch();
        
      } else {
        
        $sql = "SELECT * FROM " . $table;
        $stmt = $database->prepare($sql);
        $stmt->execute();
        $found = $stmt->fetchAll();
      }
    } catch (PDOException $e) {
      $_SESSION['message'] = $e->getMessage();
      $_SESSION['type'] = 'danger';
    }
    
    return $found;
  }

  /**
   *  Pesquisa Todos os Registros de uma Tabela
   */
  function find_all( $table ) {
      return find($table);
  }

 /**
*  Insere um registro no BD
*/
  function save($table = null, $data = null) {

      $database = open_database();

      if (!$data || empty($data)) {
          $_SESSION['message'] = 'Nenhum dado para inserir.';
          $_SESSION['type'] = 'danger';
          return false;
      }

      try {
        $columns = implode(", ", array_keys($data));
        $placeholders = implode(", ", array_fill(0, count($data), "?"));
        $values = array_values($data);

        $sql = "INSERT INTO $table ($columns) VALUES ($placeholders)";

        $stmt = $database->prepare($sql);
        $stmt->execute($values);

        $_SESSION['message'] = 'Registro cadastrado com sucesso.';
        $_SESSION['type'] = 'success';
        return true;

      } catch (PDOException $e) { 

        $_SESSION['message'] = 'Nao foi possivel realizar a operacao.';
        $_SESSION['type'] = 'danger';
        error_log("INSERT ERROR: " . $e->getMessage());
        return false;
      } 
  }

  function clear_messages() {
    $_SESSION['message'] = null;
    $_SESSION['type'] = null;
  }

  //Criptografia
  function criptografia($senha){
      
      /*
          ==> Criptografia Blowfish
          http://www.linhadecodigo.com.br/artigo/3532/criptografando-senhas-usando-bcrypt-blowfish-no-php.aspx
      */
      
      //Aplicando a criptografia
      $cust0 = "08";
      $salt = "CflfilePArK1BJomM0F6aJ";

      $hash = crypt($senha, "");
  }

  /**
   *  Remove uma linha de uma tabela pelo ID do registro
   */
  /**
 *  Visualização de um Cliente
 */
  
  /**
   *  Atualizar um registro pelo ID em uma tabela
   */
  function update($table = null, $id = 0, $data = null) {
    $database = open_database();

    if (!$data || empty($data)) {
        $_SESSION['message'] = 'Nenhum dado para atualizar.';
        $_SESSION['type'] = 'danger';
        return false;
    }

    try {
      $items = [];
      $values = [];
      
      foreach ($data as $key => $value) {
        if ($key === 'id') continue; // não atualizar o id
        $items[] = "`$key` = ?";
        $values[] = $value;
      }
      
      $values[] = $id; // Adiciona o ID ao final para o WHERE
      $items = implode(", ", $items);

      $sql = "UPDATE `" . $table . "` SET $items WHERE id = ?";
      
      $stmt = $database->prepare($sql);
      $stmt->execute($values);
      
      $_SESSION['message'] = 'Registro atualizado com sucesso.';
      $_SESSION['type'] = 'success';
      return true;
      
    } catch (PDOException $e) {
      $_SESSION['message'] = 'Erro ao atualizar: ' . $e->getMessage();
      $_SESSION['type'] = 'danger';
      error_log("UPDATE ERROR: " . $sql . " -- " . $e->getMessage());
      return false;
    }
  }

  /**
   *  Remove uma linha de uma tabela pelo ID do registro
   */
  function remove( $table = null, $id = null ) {

    $database = open_database();
    
    try {
      if ($id) {
          $sql = "DELETE FROM $table WHERE id = ?";
          $stmt = $database->prepare($sql);
          $stmt->execute([$id]);
          
          $_SESSION['message'] = "Registro Removido com Sucesso.";
          $_SESSION['type'] = 'success';
          return true;
      }
    } catch (PDOException $e) { 
      $_SESSION['message'] = $e->getMessage();
      $_SESSION['type'] = 'danger';
      return false;
    }
  }

  //Pesquisa um Registro pelo ID em uma Tabela
  function filter( $table = null, $p = null ) {
    
    $database = open_database();
    $found = null;

    try {
      if ($p) {
        $sql = "SELECT * FROM $table WHERE $p";
        $stmt = $database->prepare($sql);
        $stmt->execute();
        $found = $stmt->fetchAll();
        
      } else {
        throw new Exception("Sem dados por aqui!");
      }
    } catch (PDOException $e) {
      $_SESSION['message'] = $e->getMessage();
      $_SESSION['type'] = 'danger';
    }
    
    return $found;
  }
?>