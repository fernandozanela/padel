-- Criar tabela de usuários
CREATE TABLE IF NOT EXISTS users (
  id INT AUTO_INCREMENT PRIMARY KEY,
  nome VARCHAR(100) NOT NULL,
  email VARCHAR(150) NOT NULL UNIQUE,
  senha_hash VARCHAR(255) NOT NULL,
  role VARCHAR(50) DEFAULT 'user',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Exemplo de inserção (substitua o hash por um gerado em PHP):
-- Senha em texto: admin123
INSERT INTO users (nome, email, senha_hash, role) VALUES
('Admin', 'admin@exemplo.com', '$2y$10$6ywmxWZpo1i7pC5lI9T1Ue0k3S2xk8m2IY3Hq0q0f5o0sG/2rF7l6', 'admin');
