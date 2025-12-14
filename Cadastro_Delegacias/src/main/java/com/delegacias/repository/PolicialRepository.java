package com.delegacias.repository;

import com.delegacias.model.Policial;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface PolicialRepository extends JpaRepository<Policial, Long> {
    List<Policial> findByDelegacia_Id(Long delegacia_id);
    Policial findByMatricula(String matricula);
}
