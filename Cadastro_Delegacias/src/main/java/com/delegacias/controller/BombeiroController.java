package com.delegacias.controller;

import com.delegacias.model.Bombeiro;
import com.delegacias.service.BombeiroService;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.ModelAndView;

import java.util.List;

@Controller // 1. Marca a classe como um Controller MVC
@RequestMapping("/bombeiro") // 2. Define o prefixo base para todas as URLs neste controller
public class BombeiroController {
    private final BombeiroService bombeiroService;

    @Autowired
    public BombeiroController(BombeiroService bombeiroService) {
        this.bombeiroService = bombeiroService;
    }

    @GetMapping
    public String listarBombeiros(Model model) {
        List<Bombeiro> bombeiro = bombeiroService.buscarTodas();
        model.addAttribute("listaBombeiro", bombeiro);
        return "bombeiro/listaBombeiro";
    }

    @GetMapping("/novo")
    public String exibirFormulario(Model model) {
        model.addAttribute("bombeiro", new Bombeiro());
        return "bombeiro/formBombeiro";
    }

    @PostMapping
    public String salvarBombeiro(
            @Valid @ModelAttribute("bombeiro") Bombeiro bombeiro,
            BindingResult result,
            Model model) {

        if (result.hasErrors()) {
            // Se houver erros, retorna para o formulário para exibir as mensagens de erro
            return "bombeiro/formBombeiro";
        }
        bombeiroService.salvar(bombeiro);
        // Redireciona para a lista após salvar com sucesso
        return "redirect:/bombeiro";
    }

    @GetMapping("/editar/{id}") // Mapeia requisições GET para /delegacias/editar/{id}
    public ModelAndView editarBombeiro(@PathVariable("id") Long id) {
        ModelAndView mv = new ModelAndView("bombeiro/formBombeiro");
        Bombeiro bombeiro = bombeiroService.buscarPorId(id)
                .orElseThrow(() -> new IllegalArgumentException("ID de Corpo inválido:" + id));

        mv.addObject("bombeiro", bombeiro);
        return mv;
    }

    @GetMapping("/deletar/{id}") // Mapeia requisições GET (usadas para deleção simples em aplicações web)
    public String deletarBombeiro(@PathVariable("id") Long id) {
        bombeiroService.deletarPorId(id);
        return "redirect:/bombeiro";
    }

}
