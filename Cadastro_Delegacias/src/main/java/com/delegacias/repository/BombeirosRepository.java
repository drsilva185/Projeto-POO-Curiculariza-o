package com.delegacias.repository;

import com.delegacias.model.Bombeiros;
import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import java.util.List;

@Repository
public interface BombeirosRepository extends JpaRepository<Bombeiros, Long> {
    List<Bombeiros> findByBombeiro_Id(Long bombeiroId);
    Bombeiros findByMatricula (String matricula);
}
