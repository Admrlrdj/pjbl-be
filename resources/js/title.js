// public/js/webgl/Title.js
import { Plane, Texture } from 'ogl';

export default class Title {
    constructor(gl, text) {
        this.gl = gl;
        this.text = text;

        this.createTexture();
        this.createMesh();
    }

    createTexture() {
        const canvas = document.createElement('canvas');
        const ctx = canvas.getContext('2d');

        canvas.width = 1024;
        canvas.height = 512;

        ctx.fillStyle = "#ffffff";
        ctx.font = "32px Arial";
        ctx.textAlign = "center";
        ctx.textBaseline = "middle";
        ctx.fillText(this.text, canvas.width / 2, canvas.height / 2);

        this.texture = new Texture(this.gl);
        this.texture.image = canvas;
    }

    createMesh() {
        this.geometry = new Plane(this.gl, {
            width: 1.8,
            height: 0.6
        });

        this.program = new Program(this.gl, {
            vertex: `
                attribute vec2 uv;
                attribute vec3 position;
                varying vec2 vUv;
                void main() {
                    vUv = uv;
                    gl_Position = vec4(position, 1.0);
                }
            `,
            fragment: `
                precision highp float;
                varying vec2 vUv;
                uniform sampler2D tMap;
                void main() {
                    gl_FragColor = texture2D(tMap, vUv);
                }
            `,
            uniforms: {
                tMap: { value: this.texture }
            }
        });

        this.mesh = new Mesh(this.gl, {
            geometry: this.geometry,
            program: this.program
        });
    }
}
