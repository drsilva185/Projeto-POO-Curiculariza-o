package com.delegacias.controller;

import com.delegacias.model.Delegacia;
import com.delegacias.service.DelegaciaService;
import jakarta.validation.Valid;
import org.springframework.beans.factory.annotation.Autowired;
import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.validation.BindingResult;
import org.springframework.web.bind.annotation.*;
import org.springframework.web.servlet.ModelAndView;

import java.util.List;

@Controller // 1. Marca a classe como um Controller MVC
@RequestMapping("/delegacias") // 2. Define o prefixo base para todas as URLs neste controller
public class DelegaciaController {
    private final DelegaciaService delegaciaService;

    @Autowired
    public DelegaciaController(DelegaciaService delegaciaService) {
        this.delegaciaService = delegaciaService;
    }

    // --- 1. LISTAR TODAS AS DELEGACIAS (READ) ---
    @GetMapping // Mapeia requisições GET para /delegacias
    public String listarDelegacias(Model model) {
        List<Delegacia> delegacias = delegaciaService.buscarTodas();
        // Adiciona a lista ao objeto Model, que será acessível no template HTML
        model.addAttribute("listaDelegacias", delegacias);
        // Retorna o nome do template HTML a ser renderizado (src/main/resources/templates/delegacias/listaDelegacias.html)
        return "delegacias/listaDelegacias";
    }

    // --- 2. EXIBIR FORMULÁRIO DE CADASTRO (CREATE - Parte 1) ---
    @GetMapping("/novo") // Mapeia requisições GET para /delegacias/novo
    public String exibirFormulario(Model model) {
        // Cria uma nova instância vazia para preenchimento no formulário
        model.addAttribute("delegacia", new Delegacia());
        // Retorna o template do formulário
        return "delegacias/formDelegacia";
    }

    // --- 3. SALVAR NOVA DELEGACIA (CREATE - Parte 2) ---
    @PostMapping // Mapeia requisições POST para /delegacias (do formulário)
    public String salvarDelegacia(
            @Valid @ModelAttribute("delegacia") Delegacia delegacia, // 3.1. Recebe o objeto do formulário e valida
            BindingResult result, // 3.2. Contém os erros de validação
            Model model) {

        if (result.hasErrors()) {
            // Se houver erros, retorna para o formulário para exibir as mensagens de erro
            return "delegacias/formDelegacia";
        }

        delegaciaService.salvar(delegacia);
        // Redireciona para a lista após salvar com sucesso
        return "redirect:/delegacias";
    }

    // --- 4. EXIBIR FORMULÁRIO DE EDIÇÃO (UPDATE - Partes 1 e 2) ---
    @GetMapping("/editar/{id}") // Mapeia requisições GET para /delegacias/editar/{id}
    public ModelAndView editarDelegacia(@PathVariable("id") Long id) {
        ModelAndView mv = new ModelAndView("delegacias/formDelegacia");
        Delegacia delegacia = delegaciaService.buscarPorId(id)
                .orElseThrow(() -> new IllegalArgumentException("ID de Delegacia inválido:" + id));

        mv.addObject("delegacia", delegacia);
        return mv;
    }

    // --- 5. DELETAR DELEGACIA (DELETE) ---
    @GetMapping("/deletar/{id}") // Mapeia requisições GET (usadas para deleção simples em aplicações web)
    public String deletarDelegacia(@PathVariable("id") Long id) {
        delegaciaService.deletarPorId(id);
        return "redirect:/delegacias";
    }
}
