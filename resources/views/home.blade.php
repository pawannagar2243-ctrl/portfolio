<!DOCTYPE html>
<html lang="en" class="scroll-smooth">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rakesh Nagar | Full-Stack Laravel Developer</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        tailwind.config = {
            darkMode: 'class',
            theme: {
                extend: {
                    fontFamily: {
                        heading: ['var(--font-heading-name)', 'sans-serif'],
                        body: ['var(--font-body-name)', 'sans-serif'],
                        mono: ['var(--font-mono-name)', 'monospace'],
                    },
                    colors: {
                        background: {
                            900: '#0F172A',
                            800: '#1E293B',
                            700: '#334155',
                        },
                        primary: {
                            500: '#6366F1', // Indigo
                            600: '#4F46E5',
                        },
                        secondary: {
                            400: '#38BDF8', // Sky/Cyan
                            500: '#0EA5E9',
                        },
                        accent: {
                            400: '#2DD4BF', // Teal/Emerald
                        }
                    },
                    backgroundImage: {
                        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))',
                        'hero-glow': 'conic-gradient(from 90deg at 50% 50%, #0F172A 0%, #1E293B 50%, #0F172A 100%)',
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'float-delayed': 'float 6s ease-in-out 3s infinite',
                        'pulse-slow': 'pulse 4s cubic-bezier(0.4, 0, 0.6, 1) infinite',
                        'spin-slow': 'spin 12s linear infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0)' },
                            '50%': { transform: 'translateY(-20px)' },
                        }
                    }
                }
            }
        }
    </script>

    <!-- Google Fonts -->
    <link id="heading-font-link" href="https://fonts.googleapis.com/css2?family=Poppins:wght@600;700;800&display=swap"
        rel="stylesheet">
    <link id="body-font-link" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=JetBrains+Mono:wght@400;500&display=swap" rel="stylesheet">

    <style>
        :root {
            --font-heading-name: 'Poppins';
            --font-body-name: 'Inter';
            --font-mono-name: 'JetBrains Mono';
            --card-tilt-deg: 5deg;
        }

        body {
            background-color: #0F172A;
            color: #F8FAFC;
            overflow-x: hidden;
        }

        /* Preloader CSS (From Upper Code) */
        #preloader {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100vh;
            background: #0f0c29;
            display: flex;
            justify-content: center;
            align-items: center;
            z-index: 99999;
            transition: 0.5s;
        }

        .loader {
            width: 60px;
            height: 60px;
            border: 6px solid rgba(255, 255, 255, 0.2);
            border-top: 6px solid #00f2fe;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        /* 3D Utilities */
        .perspective-1000 {
            perspective: 1000px;
        }

        .preserve-3d {
            transform-style: preserve-3d;
        }

        .backface-hidden {
            backface-visibility: hidden;
        }

        /* Glassmorphism */
        .glass-panel {
            background: rgba(30, 41, 59, 0.4);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1);
        }

        .glass-card {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.05) 0%, rgba(255, 255, 255, 0.01) 100%);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.05);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
        }

        .glass-card:hover {
            background: linear-gradient(135deg, rgba(255, 255, 255, 0.1) 0%, rgba(255, 255, 255, 0.02) 100%);
            border-color: rgba(99, 102, 241, 0.3);
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 20px 40px -10px rgba(99, 102, 241, 0.2);
        }

        /* Custom Scrollbar */
        ::-webkit-scrollbar {
            width: 8px;
        }

        ::-webkit-scrollbar-track {
            background: #0F172A;
        }

        ::-webkit-scrollbar-thumb {
            background: #334155;
            border-radius: 4px;
        }

        ::-webkit-scrollbar-thumb:hover {
            background: #475569;
        }

        /* Animated Background Mesh */
        .bg-mesh {
            position: fixed;
            top: 0;
            left: 0;
            width: 100vw;
            height: 100vh;
            z-index: -1;
            overflow: hidden;
            pointer-events: none;
        }

        .blob {
            position: absolute;
            filter: blur(80px);
            opacity: 0.4;
            animation: float 10s infinite ease-in-out;
        }

        .blob-1 {
            top: -10%;
            left: -10%;
            width: 50vw;
            height: 50vw;
            background: #4F46E5;
            border-radius: 40% 60% 70% 30% / 40% 50% 60% 50%;
        }

        .blob-2 {
            bottom: -10%;
            right: -10%;
            width: 40vw;
            height: 40vw;
            background: #0EA5E9;
            border-radius: 60% 40% 30% 70% / 60% 30% 70% 40%;
            animation-delay: -5s;
        }

        .blob-3 {
            top: 40%;
            left: 40%;
            width: 30vw;
            height: 30vw;
            background: #6366F1;
            border-radius: 30% 70% 70% 30% / 30% 30% 70% 70%;
            animation-delay: -2s;
            opacity: 0.2;
        }

        /* Typing Cursor */
        .typing-cursor::after {
            content: '|';
            animation: blink 1s step-start infinite;
        }

        @keyframes blink {
            50% {
                opacity: 0;
            }
        }

        .tilt-card {
            transform-style: preserve-3d;
            transform: perspective(1000px);
        }

        .tilt-content {
            transform: translateZ(20px);
        }

        .grid-bg {
            background-size: 40px 40px;
            background-image: linear-gradient(to right, rgba(255, 255, 255, 0.03) 1px, transparent 1px),
                linear-gradient(to bottom, rgba(255, 255, 255, 0.03) 1px, transparent 1px);
        }
    </style>
</head>

<body class="font-body antialiased selection:bg-primary-500 selection:text-white">

    <!-- PRELOADER (From Upper Code Logic) -->
    <div id="preloader">
        <div class="loader"></div>
    </div>

    <!-- Animated Background -->
    <div class="bg-mesh">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
        <div class="absolute inset-0 grid-bg opacity-30"></div>
    </div>

    <!-- Navigation -->
    <nav class="fixed top-0 w-full z-50 transition-all duration-300" id="navbar">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <a href="#" class="flex items-center gap-2 group">
                    <div
                        class="w-10 h-10 rounded-lg bg-gradient-to-br from-primary-500 to-secondary-500 flex items-center justify-center text-white font-bold text-xl shadow-lg shadow-primary-500/20 group-hover:shadow-primary-500/40 transition-all duration-300">
                        &lt;/&gt;
                    </div>
                    <span class="font-heading font-bold text-xl tracking-tight text-white">Rakesh<span
                            class="text-secondary-400">Nagar</span></span>
                </a>

                <!-- Desktop Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="#about"
                        class="text-sm font-medium text-gray-300 hover:text-white transition-colors">About</a>
                    <a href="#services"
                        class="text-sm font-medium text-gray-300 hover:text-white transition-colors">Services</a>
                    <a href="#projects"
                        class="text-sm font-medium text-gray-300 hover:text-white transition-colors">Work</a>
                    <a href="#contact"
                        class="px-5 py-2.5 rounded-full bg-white/10 hover:bg-white/20 border border-white/10 text-sm font-medium text-white transition-all backdrop-blur-sm">Contact
                        Me</a>
                </div>

                <!-- Mobile Menu Button -->
                <button class="md:hidden text-gray-300 hover:text-white">
                    <i data-lucide="menu" class="w-6 h-6"></i>
                </button>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section class="relative min-h-screen flex items-center justify-center pt-20 overflow-hidden perspective-1000">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 w-full grid lg:grid-cols-2 gap-12 items-center">

            <!-- Hero Content -->
            <div class="order-2 lg:order-1 space-y-8 z-10">
                <div
                    class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-primary-500/10 border border-primary-500/20 text-primary-400 text-xs font-mono font-medium animate-fade-in-up">
                    <span class="w-2 h-2 rounded-full bg-green-400 animate-pulse"></span>
                    Available for freelance projects
                </div>

                <h1 class="font-heading text-5xl lg:text-7xl font-bold leading-tight text-white">
                    Hi, I'm <span
                        class="text-transparent bg-clip-text bg-gradient-to-r from-primary-500 via-secondary-400 to-primary-500 animate-gradient-x">Rakesh
                        Nagar</span>
                </h1>

                <div class="text-xl text-gray-400 font-light h-8 flex items-center">
                    <span class="text-secondary-400 mr-2">&gt;</span>
                    <span id="typing-text" class="typing-cursor">Full Stack Developer</span>
                </div>

                <p class="text-gray-400 max-w-lg leading-relaxed">
                    I design and develop modern, high-performance web applications using Laravel, React, and
                    cutting-edge UI/UX principles.
                </p>

                <div class="flex flex-wrap gap-4 pt-4">
                    <a href="#projects"
                        class="group relative px-8 py-4 bg-primary-600 hover:bg-primary-500 text-white rounded-lg font-medium transition-all duration-300 shadow-lg shadow-primary-600/25 hover:shadow-primary-600/40 hover:-translate-y-1 overflow-hidden">
                        <div
                            class="absolute inset-0 w-full h-full bg-gradient-to-r from-transparent via-white/20 to-transparent -translate-x-full group-hover:animate-shimmer">
                        </div>
                        <span class="relative flex items-center gap-2">
                            View My Work <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </span>
                    </a>
                    <a href="#contact"
                        class="px-8 py-4 bg-transparent border border-gray-700 hover:border-gray-500 text-gray-300 hover:text-white rounded-lg font-medium transition-all duration-300 hover:-translate-y-1 flex items-center gap-2">
                        <i data-lucide="download" class="w-4 h-4"></i> Hire Me
                    </a>
                </div>

                <div class="flex items-center gap-6 pt-8 text-gray-500">
                    <a href="https://github.com/rnrakeshnagar7742-coder" target="blank"
                        class="hover:text-white hover:-translate-y-1 transition-all duration-300"><i
                            data-lucide="github" class="w-6 h-6"></i></a>
                    <a href="https://www.linkedin.com/in/rakesh-nagar-958b4128b?utm_source=share&utm_campaign=share_via&utm_content=profile&utm_medium=android_app"
                        target="blank" class="hover:text-white hover:-translate-y-1 transition-all duration-300"><i
                            data-lucide="linkedin" class="w-6 h-6"></i></a>
                    <a href="https://x.com/RakeshNagar06" target="_blank"
                        class="hover:text-white hover:-translate-y-1 transition-all duration-300">
                        <svg class="w-6 h-6 fill-current" viewBox="0 0 24 24">
                            <path
                                d="M18.244 2H21.5l-7.5 8.57L22 22h-6.828l-5.352-6.94L3.5 22H.244l8.046-9.2L0 2h6.828l4.86 6.32L18.244 2z" />
                        </svg>
                    </a>

                </div>
            </div>

            <!-- Hero 3D Visual -->
            <div class="order-1 lg:order-2 relative flex justify-center perspective-1000 z-10">
                <!-- Decorative Elements behind -->
                <div
                    class="absolute top-0 right-0 w-64 h-64 bg-primary-500/20 rounded-full blur-3xl animate-pulse-slow">
                </div>
                <div class="absolute bottom-0 left-10 w-48 h-48 bg-secondary-500/20 rounded-full blur-3xl animate-pulse-slow"
                    style="animation-delay: 1s;"></div>

                <!-- 3D Tilt Card -->
                <div id="hero-card"
                    class="tilt-card relative w-full max-w-md aspect-[4/5] rounded-2xl glass-panel p-2 transition-transform duration-100 ease-out">
                    <div class="relative w-full h-full rounded-xl overflow-hidden bg-gray-900 border border-white/5">
                        <img src="https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Rakesh Nagar"
                            class="w-full h-full object-cover opacity-90 hover:scale-105 transition-transform duration-700">

                        <!-- Floating Badge 1 -->
                        <div
                            class="absolute top-6 left-6 glass-panel px-4 py-2 rounded-lg flex items-center gap-3 tilt-content shadow-xl animate-float">
                            <div
                                class="w-8 h-8 rounded bg-[#FF2D20] flex items-center justify-center text-white font-bold text-xs">
                                L</div>
                            <div>
                                <div class="text-xs text-gray-400">Expert</div>
                                <div class="text-sm font-bold text-white">Laravel</div>
                            </div>
                        </div>

                        <!-- Floating Badge 2 -->
                        <div
                            class="absolute bottom-24 right-6 glass-panel px-4 py-2 rounded-lg flex items-center gap-3 tilt-content shadow-xl animate-float-delayed">
                            <div
                                class="w-8 h-8 rounded bg-[#61DAFB] flex items-center justify-center text-white font-bold text-xs">
                                R</div>
                            <div>
                                <div class="text-xs text-gray-400">Frontend</div>
                                <div class="text-sm font-bold text-white">React</div>
                            </div>
                        </div>

                        <!-- Code Snippet Overlay -->
                        <div
                            class="absolute bottom-0 left-0 w-full bg-gradient-to-t from-gray-900 via-gray-900/90 to-transparent p-6 pt-12">
                            <div class="font-mono text-xs text-secondary-400 mb-1">// System Status</div>
                            <div class="flex items-center gap-2 text-sm text-green-400 font-mono">
                                <span class="w-2 h-2 rounded-full bg-green-400"></span>
                                <span>Open to Work</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Scroll Indicator -->
        <div
            class="absolute bottom-10 left-1/2 -translate-x-1/2 flex flex-col items-center gap-2 text-gray-500 animate-bounce">
            <span class="text-xs tracking-widest uppercase">Scroll</span>
            <i data-lucide="chevron-down" class="w-4 h-4"></i>
        </div>
    </section>

    <!-- Tech Stack Marquee -->
    <div class="py-10 bg-gray-900/50 border-y border-white/5 overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 relative">
            <div
                class="flex gap-12 items-center justify-center opacity-60 grayscale hover:grayscale-0 transition-all duration-500 flex-wrap">
                <span class="text-xl font-bold text-white flex items-center gap-2"><i data-lucide="server"
                        class="text-[#FF2D20]"></i> Laravel</span>
                <span class="text-xl font-bold text-white flex items-center gap-2"><i data-lucide="layout"
                        class="text-[#61DAFB]"></i> React</span>
                <span class="text-xl font-bold text-white flex items-center gap-2"><i data-lucide="wind"
                        class="text-[#38BDF8]"></i> Tailwind</span>
                <span class="text-xl font-bold text-white flex items-center gap-2"><i data-lucide="database"
                        class="text-[#00758F]"></i> MySQL</span>
                <span class="text-xl font-bold text-white flex items-center gap-2">
                <!-- Node.js SVG Icon -->
                <svg class="w-6 h-6" viewBox="0 0 128 128">
                    <path fill="#339933" d="M112.771 30.334L68.674 4.357c-3.792-2.19-8.498-2.19-12.29 0L12.23 30.334A12.342 12.342 0 0 0 6 41.244v51.983a12.342 12.342 0 0 0 6.229 10.91l44.097 25.977a12.286 12.286 0 0 0 12.29 0l44.098-25.977a12.342 12.342 0 0 0 6.229-10.91V41.244a12.342 12.342 0 0 0-6.229-10.91z"></path>
                    <path fill="#fff" d="M77.9 88.6c-1.1 0-2.2-.3-3.1-.8l-9.8-5.8c-1.5-.8-.7-1.1-.3-1.3 1.9-.7 2.3-.8 4.3-1.9.2-.1.5 0 .7.1l7.5 4.5c.3.1.6.1.8 0l29.4-17c.2-.1.4-.4.4-.7V32c0-.3-.1-.5-.4-.7L78 14.3c-.2-.1-.5-.1-.8 0L48 31.3c-.2.1-.4.4-.4.7v34c0 .3.1.5.4.7l8 4.6c4.4 2.2 7.1-.4 7.1-3V35.1c0-.4.3-.8.8-.8h3.6c.4 0 .8.3.8.8v33.5c0 5.8-3.2 9.2-8.7 9.2-1.7 0-3 0-6.7-1.8l-7.7-4.4c-1.9-1.1-3.1-3.2-3.1-5.5v-34c0-2.3 1.2-4.4 3.1-5.5l29.4-17c1.9-1.1 4.4-1.1 6.3 0l29.4 17c1.9 1.1 3.1 3.2 3.1 5.5v34c0 2.3-1.2 4.4-3.1 5.5l-29.4 17c-.9.5-2 .8-3.1.8zm9.1-23.6c-12.4 0-15-5.7-15-10.5 0-.4.3-.8.8-.8h3.7c.4 0 .7.3.7.7.5 3.3 1.9 4.9 8.3 4.9 5.1 0 7.3-1.2 7.3-3.9 0-1.6-.6-2.7-8.6-3.5-6.7-.7-10.8-2.1-10.8-7.4 0-4.9 4.1-7.8 11-7.8 7.7 0 11.5 2.7 12 8.4 0 .2-.1.4-.2.6-.1.1-.3.2-.5.2h-3.7c-.3 0-.6-.2-.7-.5-.8-3.4-2.6-4.5-6.9-4.5-5.1 0-5.7 1.8-5.7 3.1 0 1.6.7 2.1 8.3 3 7.5.9 11.1 2.3 11.1 7.4-.1 5.3-4.4 8.6-12.1 8.6z"></path>
                </svg>
                Node.js
            </span>

            </div>
        </div>
    </div>

    <!-- About Section -->
    <section id="about" class="py-24 relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="grid md:grid-cols-2 gap-16 items-center">
                <div class="relative group">
                    <div
                        class="absolute -inset-4 bg-gradient-to-r from-primary-500 to-secondary-500 rounded-2xl opacity-20 blur-xl group-hover:opacity-40 transition duration-500">
                    </div>
                    <div
                        class="relative glass-panel rounded-2xl p-8 md:p-10 transform transition duration-500 hover:scale-[1.01]">
                        <div class="font-mono text-secondary-400 mb-4 text-sm">class Developer extends Human {</div>
                        <div class="space-y-2 pl-4 border-l-2 border-gray-700 font-mono text-sm text-gray-300">
                            <p><span class="text-primary-400">constructor</span>() {</p>
                            <p class="pl-4">this.name = <span class="text-green-400">'Rakesh Nagar'</span>;</p>
                            <p class="pl-4">this.role = <span class="text-green-400">'Full Stack Developer'</span>;</p>
                            <p class="pl-4">this.location = <span class="text-green-400">'India'</span>;</p>
                            <p>}</p>
                        </div>
                        <div class="font-mono text-secondary-400 mt-4 text-sm">}</div>

                        <!-- Stats -->
                        <div class="grid grid-cols-3 gap-4 mt-8 pt-8 border-t border-white/10">
                            <div class="text-center">
                                <div class="text-2xl font-bold text-white">50+</div>
                                <div class="text-xs text-gray-400 mt-1">Projects</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-white">30+</div>
                                <div class="text-xs text-gray-400 mt-1">Clients</div>
                            </div>
                            <div class="text-center">
                                <div class="text-2xl font-bold text-white">100%</div>
                                <div class="text-xs text-gray-400 mt-1">Success</div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="space-y-6">
                    <h2 class="font-heading text-3xl md:text-4xl font-bold text-white">About <span
                            class="text-transparent bg-clip-text bg-gradient-to-r from-secondary-400 to-primary-500">Me</span>
                    </h2>
                    <p class="text-gray-400 leading-relaxed">
                        I am a passionate Full Stack Developer specializing in Laravel and React. I build high
                        performance web applications with modern UI design, animations, and scalable backend
                        architecture.
                    </p>
                    <p class="text-gray-400 leading-relaxed">
                        My focus is on creating fast, secure, and visually stunning digital experiences.
                    </p>

                    <div class="flex flex-wrap gap-2 pt-4">
                        <span
                            class="px-4 py-2 rounded-full bg-gray-800 border border-gray-700 text-sm text-gray-300 hover:border-primary-500 hover:text-primary-400 transition-colors cursor-default">Laravel</span>
                        <span
                            class="px-4 py-2 rounded-full bg-gray-800 border border-gray-700 text-sm text-gray-300 hover:border-primary-500 hover:text-primary-400 transition-colors cursor-default">React</span>
                        <span
                            class="px-4 py-2 rounded-full bg-gray-800 border border-gray-700 text-sm text-gray-300 hover:border-primary-500 hover:text-primary-400 transition-colors cursor-default">MySQL</span>
                        <span
                            class="px-4 py-2 rounded-full bg-gray-800 border border-gray-700 text-sm text-gray-300 hover:border-primary-500 hover:text-primary-400 transition-colors cursor-default">Tailwind
                            CSS</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Services Section -->
    <section id="services" class="py-24 relative bg-gray-900/50">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="text-center max-w-2xl mx-auto mb-16">
                <h2 class="font-heading text-3xl md:text-4xl font-bold text-white mb-4">My <span
                        class="text-primary-500">Services</span></h2>
                <p class="text-gray-400">Comprehensive development services tailored to your business needs.</p>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Service Card 1 -->
                <div class="glass-card p-8 rounded-2xl group">
                    <div
                        class="w-12 h-12 rounded-lg bg-primary-500/20 flex items-center justify-center text-primary-400 mb-6 group-hover:scale-110 transition-transform">
                        <i data-lucide="code" class="w-6 h-6"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-white mb-3">Web Development</h3>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">Custom Laravel & React web applications
                        tailored to business needs.</p>
                    <a href="#contact"
                        class="text-sm font-medium text-primary-400 flex items-center gap-1 group-hover:gap-2 transition-all">Hire
                        Me <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                </div>

                <!-- Service Card 2 -->
                <div class="glass-card p-8 rounded-2xl group">
                    <div
                        class="w-12 h-12 rounded-lg bg-secondary-500/20 flex items-center justify-center text-secondary-400 mb-6 group-hover:scale-110 transition-transform">
                        <i data-lucide="palette" class="w-6 h-6"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-white mb-3">UI/UX Design</h3>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">Modern, responsive, and user-focused interface
                        design.</p>
                    <a href="#contact"
                        class="text-sm font-medium text-secondary-400 flex items-center gap-1 group-hover:gap-2 transition-all">Hire
                        Me <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                </div>

                <!-- Service Card 3 -->
                <div class="glass-card p-8 rounded-2xl group">
                    <div
                        class="w-12 h-12 rounded-lg bg-accent-400/20 flex items-center justify-center text-accent-400 mb-6 group-hover:scale-110 transition-transform">
                        <i data-lucide="server" class="w-6 h-6"></i>
                    </div>
                    <h3 class="font-heading text-xl font-bold text-white mb-3">Admin Dashboards</h3>
                    <p class="text-gray-400 text-sm leading-relaxed mb-6">Secure and scalable backend panels with
                        analytics integration.</p>
                    <a href="#contact"
                        class="text-sm font-medium text-accent-400 flex items-center gap-1 group-hover:gap-2 transition-all">Hire
                        Me <i data-lucide="arrow-right" class="w-4 h-4"></i></a>
                </div>
            </div>
        </div>
    </section>

    <!-- Projects Section -->
    <section id="projects" class="py-24 relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="flex flex-col md:flex-row md:items-end justify-between mb-12 gap-6">
                <div>
                    <h2 class="font-heading text-3xl md:text-4xl font-bold text-white mb-4">Featured <span
                            class="text-secondary-400">Projects</span></h2>
                    <p class="text-gray-400">A selection of my recent work.</p>
                </div>
            </div>

            <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                <!-- Project 1 -->
                <div class="group relative rounded-2xl overflow-hidden glass-card border-0">
                    <div class="aspect-video overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1460925895917-afdab827c52f?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Project 1"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gray-900/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-4 backdrop-blur-sm">
                            <a href="#"
                                class="p-3 bg-white rounded-full text-gray-900 hover:bg-primary-500 hover:text-white transition-colors"><i
                                    data-lucide="external-link" class="w-5 h-5"></i></a>
                            <a href="#"
                                class="p-3 bg-white rounded-full text-gray-900 hover:bg-primary-500 hover:text-white transition-colors"><i
                                    data-lucide="github" class="w-5 h-5"></i></a>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-heading text-xl font-bold text-white mb-2">E-Commerce Platform</h3>
                        <p class="text-gray-400 text-sm">Full-featured online store with payment gateway, admin
                            dashboard, and order management.</p>
                    </div>
                </div>

                <!-- Project 2 -->
                <div class="group relative rounded-2xl overflow-hidden glass-card border-0">
                    <div class="aspect-video overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1551288049-bebda4e38f71?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Project 2"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gray-900/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-4 backdrop-blur-sm">
                            <a href="#"
                                class="p-3 bg-white rounded-full text-gray-900 hover:bg-primary-500 hover:text-white transition-colors"><i
                                    data-lucide="external-link" class="w-5 h-5"></i></a>
                            <a href="#"
                                class="p-3 bg-white rounded-full text-gray-900 hover:bg-primary-500 hover:text-white transition-colors"><i
                                    data-lucide="github" class="w-5 h-5"></i></a>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-heading text-xl font-bold text-white mb-2">Portfolio Website</h3>
                        <p class="text-gray-400 text-sm">Modern Portfolio Website with 3D UI and animations.</p>
                    </div>
                </div>

                <!-- Project 3 -->
                <div class="group relative rounded-2xl overflow-hidden glass-card border-0">
                    <div class="aspect-video overflow-hidden relative">
                        <img src="https://images.unsplash.com/photo-1555099962-4199c345e5dd?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80"
                            alt="Project 3"
                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-110">
                        <div
                            class="absolute inset-0 bg-gray-900/80 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center gap-4 backdrop-blur-sm">
                            <a href="#"
                                class="p-3 bg-white rounded-full text-gray-900 hover:bg-primary-500 hover:text-white transition-colors"><i
                                    data-lucide="external-link" class="w-5 h-5"></i></a>
                            <a href="#"
                                class="p-3 bg-white rounded-full text-gray-900 hover:bg-primary-500 hover:text-white transition-colors"><i
                                    data-lucide="github" class="w-5 h-5"></i></a>
                        </div>
                    </div>
                    <div class="p-6">
                        <h3 class="font-heading text-xl font-bold text-white mb-2">CRM Application</h3>
                        <p class="text-gray-400 text-sm">SaaS Based CRM Application with scalable backend architecture.
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Contact Section -->
    <section id="contact" class="py-24 relative">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="glass-panel rounded-3xl overflow-hidden shadow-2xl shadow-primary-900/20">
                <div class="grid lg:grid-cols-2">
                    <!-- Contact Info -->
                    <div class="bg-primary-600 p-10 lg:p-16 relative overflow-hidden">
                        <div class="absolute inset-0 bg-gradient-to-br from-primary-600 to-primary-800"></div>
                        <div
                            class="absolute bottom-0 right-0 w-64 h-64 bg-white/10 rounded-full blur-3xl translate-x-1/3 translate-y-1/3">
                        </div>

                        <div class="relative z-10 text-white">
                            <h2 class="font-heading text-3xl font-bold mb-6">Contact Me</h2>
                            <p class="text-primary-100 mb-12">Have a project in mind? I'm currently available for
                                freelance work.</p>

                            <div class="space-y-6">
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                                        <i data-lucide="mail" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                        <div class="text-xs text-primary-200">Email</div>
                                        <div class="font-medium">rakesh@example.com</div>
                                    </div>
                                </div>
                                <div class="flex items-center gap-4">
                                    <div class="w-10 h-10 rounded-full bg-white/20 flex items-center justify-center">
                                        <i data-lucide="map-pin" class="w-5 h-5"></i>
                                    </div>
                                    <div>
                                        <div class="text-xs text-primary-200">Location</div>
                                        <div class="font-medium">India</div>
                                    </div>
                                </div>
                            </div>

                            <div class="mt-12 flex gap-4">
                                <a href="#"
                                    class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors"><i
                                        data-lucide="github" class="w-5 h-5"></i></a>
                                <a href="#"
                                    class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors"><i
                                        data-lucide="linkedin" class="w-5 h-5"></i></a>
                                <a href="#"
                                    class="w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center transition-colors"><i
                                        data-lucide="instagram" class="w-5 h-5"></i></a>
                            </div>
                        </div>
                    </div>

                    <!-- Contact Form (Laravel Logic Integrated) -->
                    <div class="p-10 lg:p-16 bg-gray-900/50">
                        <!-- Success Message -->
                        @if(session('success'))
                            <div class="mb-6 p-4 rounded-lg bg-green-500/20 border border-green-500 text-green-300">
                                {{ session('success') }}
                            </div>
                        @endif

                        <form method="POST" action="{{ route('contact.send') }}" class="space-y-6">
                            @csrf

                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-400">Name</label>
                                <input type="text" name="name" value="{{ old('name') }}"
                                    class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500 transition-all"
                                    placeholder="Your Name" required>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-400">Email</label>
                                <input type="email" name="email" value="{{ old('email') }}"
                                    class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500 transition-all"
                                    placeholder="Your Email" required>
                            </div>

                            <div class="space-y-2">
                                <label class="text-sm font-medium text-gray-400">Message</label>
                                <textarea name="message" rows="5"
                                    class="w-full bg-gray-800/50 border border-gray-700 rounded-lg px-4 py-3 text-white focus:outline-none focus:border-primary-500 focus:ring-1 focus:ring-primary-500 transition-all"
                                    placeholder="Your Message" required>{{ old('message') }}</textarea>
                            </div>

                            <button type="submit"
                                class="w-full bg-gradient-to-r from-primary-600 to-secondary-500 hover:from-primary-500 hover:to-secondary-400 text-white font-bold py-4 rounded-lg shadow-lg shadow-primary-500/25 transform transition hover:-translate-y-1 active:translate-y-0">
                                Send Message
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-gray-900 border-t border-white/5 pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-6 lg:px-8">
            <div class="border-t border-white/5 pt-8 flex flex-col md:flex-row items-center justify-between gap-4">
                <div class="text-gray-500 text-sm">
                    &copy; {{ date('Y') }} Rakesh Nagar. All rights reserved.
                </div>
                <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})"
                    class="p-3 bg-gray-800 hover:bg-primary-500 text-white rounded-lg transition-colors shadow-lg">
                    <i data-lucide="arrow-up" class="w-5 h-5"></i>
                </button>
            </div>
        </div>
    </footer>

    <script>
        // Initialize Lucide Icons
        lucide.createIcons();

        // Preloader Logic
        window.addEventListener("load", function () {
            const loader = document.getElementById("preloader");
            // Fade out
            loader.style.opacity = "0";
            setTimeout(() => {
                loader.style.display = "none";
            }, 500);
        });

        // Typing Effect
        const textElement = document.getElementById('typing-text');
        const textToType = "Full Stack Developer | Laravel | React | UI/UX";
        let index = 0;

        function typeText() {
            if (index < textToType.length) {
                textElement.textContent = textToType.substring(0, index + 1);
                index++;
                setTimeout(typeText, 50);
            } else {
                // Reset and loop or stop
                setTimeout(() => {
                    index = 0;
                    textElement.textContent = '';
                    typeText();
                }, 2000);
            }
        }

        // Start typing after a slight delay
        setTimeout(typeText, 1000);

        // 3D Tilt Effect for Hero Card
        const card = document.getElementById('hero-card');
        const container = card.parentElement;

        container.addEventListener('mousemove', (e) => {
            const rect = container.getBoundingClientRect();
            const x = e.clientX - rect.left;
            const y = e.clientY - rect.top;

            const centerX = rect.width / 2;
            const centerY = rect.height / 2;

            const rotateX = ((y - centerY) / centerY) * -10;
            const rotateY = ((x - centerX) / centerX) * 10;

            card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg)`;
        });

        container.addEventListener('mouseleave', () => {
            card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0)';
        });

        // Navbar Scroll Effect
        const navbar = document.getElementById('navbar');
        window.addEventListener('scroll', () => {
            if (window.scrollY > 50) {
                navbar.classList.add('bg-gray-900/80', 'backdrop-blur-md', 'shadow-lg');
            } else {
                navbar.classList.remove('bg-gray-900/80', 'backdrop-blur-md', 'shadow-lg');
            }
        });
    </script>
</body>

</html>