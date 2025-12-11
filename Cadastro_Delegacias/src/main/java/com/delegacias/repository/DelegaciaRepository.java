package com.delegacias.repository;

import com.delegacias.model.Delegacia;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface DelegaciaRepository extends JpaRepository<Delegacia, Long>{
    List<Delegacia> findByNomeContainingIgnoreCase(String nome);
    Delegacia findByTelefone(String telefone);
}
