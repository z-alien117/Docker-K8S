# Etapa de construcción
FROM node:14 as builder

WORKDIR /usr/src/app

COPY package*.json ./

RUN npm install

COPY . .

# Etapa de producción
FROM node:14-slim

WORKDIR /usr/src/app

COPY --from=builder /usr/src/app .

EXPOSE 3000

CMD ["node", "index.js"]
